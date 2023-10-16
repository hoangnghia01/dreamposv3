<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Str;
use App\Models\Product;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $products = DB::table('products')
        // ->select('products.*', 'product_categories.name as product_category_name', 'units.name as unit_name')
        // ->leftJoin('product_categories', 'products.product_category_id', '=', 'product_categories.id')
        // ->leftJoin('units', 'products.unit_id', '=', 'units.id')
        // ->whereNull('deleted_at')
        // ->orderBy('created_at', 'desc')->get();
        $products = Product::withTrashed()
        ->with('product_category')
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.pages.product.list',
        [
        'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product_categories = DB::table('product_categories')->where('status','=',1)->get();

        return view('admin.pages.product.create', ['product_categories' => $product_categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        if($request->hasFile('image')){
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images/imageProduct/'),  $fileName);
        }
        $check = DB::table('products')->insert([
            "name" => $request->name,
            "slug" => $request->slug,
            "price" => $request->price,
            "discount_price" => $request->discount_price,
            "qty" => $request->qty,
            "description" => $request->description,
            "status" => $request->status,
            "product_category_id" => $request->product_category_id,

            "image" => $fileName ?? null,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Tạo thành công' : 'Tạo sản phẩm thất bại';
        return redirect()->route('admin.product.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = DB::table('products')->find($id);
        $product_categories = DB::table('product_categories')->where('status','=',1)->get();
        // $units = DB::table('units')->where('status','=',1)->get();
        return view('admin.pages.product.detail',
        ['product' => $product,
        'product_categories' => $product_categories

    ]);
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
    public function update(UpdateProductRequest $request, string $id)
    {

        $product = DB::table('products')->find($id);
        $oldImageFileName = $product->image;
        if($request->hasFile('image')){
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images/imageProduct/'),  $fileName);

            if(!is_null($oldImageFileName) && file_exists('images/imageProduct/'.$oldImageFileName)){
                unlink('images/imageProduct/'.$oldImageFileName);
            }
        }

        $check = DB::table('products')->where('id', '=', $id)->update([
            "name" => $request->name,
            "slug" => $request->slug,
            "price" => $request->price,
            "discount_price" => $request->discount_price,
            "qty" => $request->qty,
            "description" => $request->description,
            "status" => $request->status,
            "product_category_id" => $request->product_category_id,
            "image" => $fileName ?? $oldImageFileName,
            "updated_at" => Carbon::now()

        ]);

        $message = $check ? 'Cập nhật sản phẩm thành công!' : 'Cập nhật sản phẩm thất bại!';
        //session flash
        return redirect()->route('admin.product.index')->with('message', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $product = DB::table('products')->find($id);
        // $image = $product->image;
        // if(!is_null($image) && file_exists('images/imageProduct/'.$image)){
        //     unlink('images/imageProduct/'.$image);
        // }

        // $result = DB::table('products')->delete($id);
        // $message = $result ? 'xoa san pham thanh cong' : 'xoa san pham that bai';
        //session flash
        $productData = Product::find((int)$id);
        $productData->delete();
        return redirect()->route('admin.product.index')->with('message','Xoá sản phẩm thành công!');
    }

    public function createSlug(Request $request){
        return response()->json(['slug' => Str::slug($request->name, '-')]);
    }

    public function createCkeditupload(Request $request){

        if($request->hasFile('upload')){
            $fileOrginialName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_'.time().'.'.$request->file('upload')->getClientOriginalExtension();
            $request->file('upload')->move(public_path('images/imageProduct/'),  $fileName);

            $url = asset('images/imageProduct/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded'=> 1, 'url' => $url]);
        }
    }
    public function restore(string $id){
        //Query Builder
        // $product= DB::table('products')->find($id);
        // $product->update(['deleted_at' => null]);

        //Eloquent
        $product = Product::withTrashed()->find($id);
        $product->restore();

        return redirect()->route('admin.product.index')->with('message','Khôi phục sản phẩm thành công!');
    }
}
