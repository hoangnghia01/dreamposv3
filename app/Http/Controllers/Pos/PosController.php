<?php

namespace App\Http\Controllers\Pos;

use App\Events\ConfirmOrder;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Table;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $neworder = Order::where('status', 'neworder')->get();
        $number_neworder = count($neworder);
        // Tính tổng doanh số cho ngày hôm nay
        $today = Carbon::today();
        $totalToday = Order::whereDate('created_at', $today)
            ->where('status', 'success')
            ->sum('total');

        // Tính tổng doanh số cho ngày hôm qua
        $yesterday = Carbon::yesterday();
        $totalYesterday = Order::whereDate('created_at', $yesterday)
            ->where('status', 'success')
            ->sum('total');

            $arrayDatas = [];
            $arrayDatas[] =  ['Day', 'Total Sales'];
            $startDate = $today->copy()->subDays(6); // 6 ngày trước hôm nay

            $dataOrders = Order::selectRaw('DATE(created_at) as order_date, SUM(total) as total_sales')
                ->whereBetween('created_at', [$startDate, $today])
                // ->where('status', 'success')
                ->groupBy('order_date')
                ->get();

            foreach ($dataOrders as $data) {
                $arrayDatas[] = [$data->order_date, $data->total_sales];
            }

        return view('pos.pages.pos.index', [
            'number_neworder' => $number_neworder,
            'totalToday' => $totalToday,
            'totalYesterday' => $totalYesterday,
            'arrayDatas' => $arrayDatas
        ]);
    }

    public function listBills()
    {
        $orders = Order::where('status', 'neworder')
            ->orWhere('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->get();
        $neworder = Order::where('status', 'neworder')->get();
        $number_neworder = count($neworder);
        return view('pos.pages.pos.listbills', ['orders' => $orders, 'number_neworder' => $number_neworder]);
    }

    public function confirmbill($order)
    {
        // bao nha bep lam mon
        $order = Order::find($order);
        $order->status = Order::STATUS_PENDING;
        $order->save();

        event(new ConfirmOrder($order));

        $pdf = app('dompdf.wrapper');
        return view('pos.pages.pos.billitem', ['order' => $order]); //test
        // $pdf->loadView('pos.pages.pos.bill', ['order' => $order]);
        // return $pdf->stream('bill.pdf');

        // return redirect()->route('cashier.listbills')->with('message', 'Xac nhan thanh cong!!');
    }


    public function printbill($order_id)
    {
        $order = Order::find($order_id);
        $order->status = Order::STATUS_PENDING;
        $order->save();


        $pdf = app('dompdf.wrapper');
        return view('pos.pages.pos.bill', ['order' => $order]); //test
        // $pdf->loadView('pos.pages.pos.bill', ['order' => $order]);
        // return $pdf->stream('bill.pdf');

        // return redirect()->route('cashier.listbills')->with('message', 'Xac nhan thanh cong!!');
    }
    public function success($order_id)
    {
        $order = Order::find($order_id);
        $order->status = Order::STATUS_SUCCESS;
        $order->save();
        return redirect()->route('cashier.listbills')->with('message', 'Xac nhan thanh cong!!');
    }

    public function cancel($order_id)
    {
        $order = Order::find($order_id);
        $order->status = Order::STATUS_CANCEL;
        $order->save();
        return redirect()->route('cashier.listbills')->with('message', 'Xac nhan thanh cong!!');
    }

    public function maptable()
    {
        $neworder = Order::where('status', 'neworder')->get();
        $number_neworder = count($neworder);
        $orders = Order::where('status', 'neworder')
            ->orWhere('status', 'pending')
            ->get();
        $tables = Table::where('area', '!=', 'take away')->get();

        return view('pos.pages.pos.maptable',
        [
            'orders' => $orders,
             'number_neworder' => $number_neworder,
             'tables' => $tables,
            ]);
    }

    public function calculateTotalPrice($cart): float
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }
        return $total;
    }
    public function pos()
    {

        $neworder = Order::where('status', 'neworder')->get();
        $number_neworder = count($neworder);
        $product_categories = ProductCategory::all();
        $products = Product::all();
        $tables = Table::where('area', '=', 'take away')->get();
        $cart = session()->get('cart', []);
        $total_items = count($cart);
        $total_price = $this->calculateTotalPrice($cart);
        return view('pos.pages.pos.pospage', [
            'product_categories' => $product_categories,
            'products' => $products,
            'tables' => $tables,
            'cart' => $cart,
            'total_items' => $total_items,
            'total_price' => $total_price,
            'number_neworder' => $number_neworder
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
