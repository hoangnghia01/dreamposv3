<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function calculateTotalPrice($cart): float{
    $total = 0;
    foreach($cart as $item){
        $total += $item['price'] * $item['qty'];
    }
        return $total;
    }
    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);
        $cart = session()->get('cart', []);
        $imagesLink = is_null($product->image) || !file_exists('images/imageProduct/'.$product->image)
        ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
        : asset('images/imageProduct/'.$product->image);

        $cart[$productId] = [
            'name' => $product->name,
            'price' => $product->price,
            'image' => $imagesLink,
            'qty' => ($cart[$productId]['qty'] ?? 0) + 1
        ];

        session()->put('cart', $cart);
        $total_items = count($cart);
        $total_price = $this->calculateTotalPrice($cart);
        return response()->json([
            'message' => 'Add product to cart success',
            'total_items' => $total_items,
            'total_price' => $total_price,
            'cart' => $cart
        ]);
    }

    // public function index()
    // {
    //     $cart = session()->get('cart', []);
    //     dd(session()->get('cart'));
    //     return view('client.pages.cart', ['cart' => $cart]);
    // }

    public function deleteToCart($productId){
        $cart = session()->get('cart', []);
        $total_items = count($cart);

        if(array_key_exists($productId, $cart)){
            unset($cart[$productId]);
            session()->put('cart', $cart);
            $total_items = count($cart);
        }
        $total_price = $this->calculateTotalPrice($cart);
        return response()->json([
            'message' => 'Delete item success',
            'total_items' => $total_items,
            'total_price' => $total_price,
            'cart' => $cart
    ]);
    }

    public function updateItem($productId, $num){
        $cart = session()->get('cart', []);
        if(array_key_exists($productId, $cart)){
            $cart[$productId]['qty'] += $num;
            if(!$cart[$productId]['qty']){
                unset($cart[$productId]);
            }
            session()->put('cart', $cart);
        }
        $total_price = $this->calculateTotalPrice($cart);
        $total_items = count($cart);
        return response()->json([
            'message' => 'Update item success',
            'total_price' => $total_price,
            'total_items' => $total_items,
            'cart' => $cart
        ]);
    }

    public function emptyCart(){
        session()->put('cart', []);
        return response()->json([
            'message' => 'Cart delete success',
            'total_price' => 0,
            'total_items' => 0
        ]);
    }

}
