<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('admin.pages.index');
    }

    public function saleslist(){
        $orders = Order::orderBy('created_at', 'desc')->get();
        return view('admin.pages.sale.saleslist', ['orders' => $orders]);
    }

    public function salesdetail($salesid) {
        $order = Order::find($salesid);
        return view('admin.pages.sale.salesdetails', ['order' => $order]);
    }

    public function review(){
        $review = Review::orderBy('created_at', 'desc')->get();
        return view('admin.pages.review.list', ['review' => $review]);
    }
}
