<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CienltController extends Controller
{
    // public function index()
    // {
    //     $product_categories = DB::table('product_categories')->where('status', 1)->get();
    //     $products = DB::table('products')->where('status', 1)->get();
    //     // return view('pos.pages.pos.pospage', ['product_categories' => $product_categories, 'products' => $products]);
    //     // return view('app');

    // }
    public function qrcode($table)
    {
        session()->put('table', $table);
        return redirect()->route('home.welcome');
    }

    public function welcome()
    {
        return view('client.pages.index');
    }

    public function home()
    {
        return view('client.pages.home');
    }
    public function menu()
    {
        return view('client.pages.menu');
    }




    public function calculateTotalPrice($cart): float
    {
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['qty'];
        }
        return $total;
    }

    public function getTable()
    {
        $table = session()->get('table', []);
        return response()->json(['table' => $table]);
    }


    public function index()
    {
        $product_categories = ProductCategory::all();
        $products = Product::all();

        $total_items = count(session()->get('cart', []));
        $url = asset('images/imageProduct/');
        $cart = session()->get('cart', []);
        // $table = session()->get('table' []);

        $total_price = $this->calculateTotalPrice($cart);
        return response()->json([
            'product_categories' => $product_categories,
            'products' => $products,
            'cart' => $cart,
            'total_items' => $total_items,
            'total_price' => $total_price,
            'url' => $url
        ]);
    }
    public function filterProducts($product_category_id)
    {
        $products = Product::where('product_category_id', $product_category_id)->get();
        return response()->json([
            'products' => $products,
        ]);
    }

    public function saveReview(Request $request)

    {
        $review = new Review();
        $review->rating = $request->rating;
        $review->selectedReason = $request->selectedReason;
        $review->otherReason = $request->otherReason;
        $table = session()->get('table', []);
        $review->table_id = $table;
        $review->guestname = $request->user_name;
        $review->save();

        return response()->json(['message' => 'Đánh giá đã được lưu.']);
    }
}
