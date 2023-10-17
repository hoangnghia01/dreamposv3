<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller

{

    public function dashboard()
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

        // Truy vấn tất cả đơn hàng cho hôm nay
        $totalOrdersToDay = Order::whereDate('created_at', $today)->count();

        // Truy vấn tất cả đơn hàng bị hủy hom nay
        $totalCancelledOrdersToday = Order::whereDate('created_at', $today)->where('status', 'cancel')->count();

        // Truy vấn tất cả đơn hàng bị hủy hom nay
        $totalPendingledOrdersToday = Order::whereDate('created_at', $today)->where('status', 'pending')->count();

        // Truy vấn danh sách sản phẩm bán chạy hôm nay
        $bestsellingProducts = OrderItem::with('product')
            ->select('product_id', DB::raw('SUM(qty) as total_quantity'))
            ->whereDate('created_at', $today)
            ->groupBy('product_id')
            ->orderByDesc('total_quantity')
            ->take(5) // Lấy 5 sản phẩm bán chạy nhất
            ->get();

        $dataOrders = Order::selectRaw('DATE(created_at) as order_date, SUM(total) as total_sales')
            ->whereBetween('created_at', [$startDate, $today])
            // ->where('status', 'success')
            ->groupBy('order_date')
            ->get();

        foreach ($dataOrders as $data) {
            $arrayDatas[] = [$data->order_date, $data->total_sales];
        }

        // Lấy ngày đầu tháng và ngày hiện tại
        $firstDayOfMonth = now()->startOfMonth()->toDateString();


        // Truy vấn tổng doanh số từ đầu tháng đến ngày hiện tại
        $totalFromStartOfMonth = Order::whereBetween('created_at', [$firstDayOfMonth, $today])
            ->where('status', 'success')
            ->sum('total');

            $arrayDatasStatus = [['Order Status', 'Number']];

            $dataOrders = DB::table('orders')
                ->selectRaw('status, count(status) as number')
                ->groupBy('status')
                ->get();

            foreach ($dataOrders as $data) {
                $arrayDatasStatus[] = [$data->status, $data->number];
            }

        return view('admin.pages.index', [
            'number_neworder' => $number_neworder,
            'totalToday' => $totalToday,
            'totalYesterday' => $totalYesterday,
            'totalOrdersToDay' => $totalOrdersToDay,
            'totalCancelledOrdersToday' => $totalCancelledOrdersToday,
            'totalPendingledOrdersToday' => $totalPendingledOrdersToday,
            'bestsellingProducts' => $bestsellingProducts,
            'totalFromStartOfMonth' => $totalFromStartOfMonth,
            'arrayDatas' => $arrayDatas,
            'arrayDatasStatus' => $arrayDatasStatus
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->where('role', '=', 'user_admin')->get();
        return view('admin.pages.admincreate.listsadmin', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.admincreate.createadmin');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        $user->password = Hash::make($request->password);
        $user->role = User::USER_ADMIN;
        $user->save();
        return redirect()->route('admin.admin.index')->with('message', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $admin = User::find($id);
        return view('admin.pages.admincreate.detailadmin', ['admin' => $admin]);
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
    public function update(UpdateAdminRequest $request)
    {
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
