<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderPaymentMethod;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientOrderController extends Controller
{
    public function clientPlaceOrder(Request $request){
        // dd(request()->cookie('cookieData'));
        // dd($request->user_name);
        try{
            DB::beginTransaction();
            $order = new Order;
            if (Auth::check()) {
                $order->user_id = Auth::user()->id;
            }else{
                $order->user_id = null;
            }
            $tableName = session()->get('table', []);
            $table = Table::where('name', $tableName)->first();

            $order->table_id = $table->id;
            $order->guestname = $request->user_name;

            $order->note = $request->note;
            $order->status = Order::STATUS_NEWORDER;
            $order->created_by = Order::CREATED_BY_GUEST;
            $order->save();
            $cart = session()->get('cart', []);
            $total = 0;
            foreach($cart as $productId => $item){
                $orderItems = new OrderItem();
                $orderItems->order_id = $order->id;
                $orderItems->product_id = $productId;
                $orderItems->product_name = $item['name'];
                $orderItems->product_price = $item['price'];
                $orderItems->qty = $item['qty'];
                $orderItems->save();
                $total += $item['price'] * $item['qty'];
            }

            $order->subtotal = $total;
            $order->total = $total;
            $order->save(); //update id = 10

            // Eloquent - 1
            $orderPaymentMethod = new OrderPaymentMethod();
            $orderPaymentMethod->order_id  = $order->id;
            $orderPaymentMethod->payment_provider = $request->payment_method;
            $orderPaymentMethod->status = OrderPaymentMethod::STATUS_PENDING;
            $orderPaymentMethod->total = $order->total;
            $orderPaymentMethod->save();

            //Eloquent - 2 - Mass Assignment
            // $orderPaymentMethod = OrderPaymentMethod::create([
            //     'order_id' => $order->id,
            //     'payment_provider' => $request->payment_method,
            //     'status' => OrderPaymentMethod::STATUS_PENDING,
            //     'total' => $order->total,
            // ]);

            //Reset cart
            session()->put('cart', []);
            DB::commit();
            return redirect()->route('home');

        }catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage());
        }
    }
}
