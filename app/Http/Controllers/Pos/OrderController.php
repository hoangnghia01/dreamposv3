<?php

namespace App\Http\Controllers\Pos;

use App\Events\ConfirmOrder;
use App\Http\Controllers\Controller;
use App\Http\Requests\PlaceControllerRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderPaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function placeOrder(PlaceControllerRequest $request){

        try{
            DB::beginTransaction();
            $order = new Order;
            $order->user_id = Auth::user()->id;
            $order->table_id = $request->table_id;
            $order->note = $request->note;
            $order->status = Order::STATUS_SUCCESS;
            $order->created_by = Order::CREATED_BY_CASHIER;
            $order->save();

            $cart = session()->get('cart', []);
            $total = 0;
            foreach($cart as $productId => $item){
                $orderItems = new OrderItem;
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
            $orderPaymentMethod->total = $order->total; //$total
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
            event(new ConfirmOrder($order));
            return redirect()->route('cashier.pos')->with('message', 'Xac nhan thanh cong!!');
        }catch(\Exception $exception){
            DB::rollBack();
            dd($exception->getMessage());
        }
    }
}
