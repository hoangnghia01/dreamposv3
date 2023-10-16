<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductCategoryRequest;
use App\Http\Requests\UpdateProductCategoryRequest;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // ->paginate(10)
        $product_categories = DB::table('product_categories')->get();
        return view('admin.pages.product_category.list', ['product_categories' => $product_categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductCategoryRequest $request)
    {
        if($request->hasFile('image')){
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images/imageCategory'),  $fileName);
        }
        $check = DB::table('product_categories')->insert([
            "name" => $request->name,
            "status" => $request->status,
            "image" => $fileName ?? null,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        $message = $check ? 'Tạo thành công' : 'Tạo thất bại';
        return redirect()->route('admin.product_category.index')->with('message', $message);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product_caterogy = DB::table('product_categories')->find($id);
        return view('admin.pages.product_category.detail', ['product_caterogy' => $product_caterogy]);
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
    public function update(UpdateProductCategoryRequest $request,string $id){

        //UPDATE `product_categories` SET name='', status='' WHERE id=1;
        // $check = DB::update('UPDATE `product_categories` SET name = ?, status = ? WHERE id = ?',
        // [$request->name, $request->status, $id]);

        //Eloquent
        $productCategory = ProductCategory::find($id);

        $oldImageFileName = $productCategory->image;
        if($request->hasFile('image')){
            $fileOrginialName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileOrginialName, PATHINFO_FILENAME);
            $fileName .= '_'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images/imageCategory/'),  $fileName);

            if(!is_null($oldImageFileName) && file_exists('images/imageCategory/'.$oldImageFileName)){
                unlink('images/imageCategory/'.$oldImageFileName);
            }
        }

        $productCategory->name = $request->name;
        $productCategory->status = $request->status;
        $productCategory->image = $fileName ?? $oldImageFileName;
        $check = $productCategory->save();

        $message = $check > 0 ? 'Cập nhật thành công!' : 'Cập nhật thất bại';
        //session flash
        return redirect()
        ->route('admin.product_category.index')
        ->with('message', $message);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $result = DB::table('products')->where('id',$id)->delete();
        $product_category = DB::table('product_categories')->find($id);
        $image = $product_category->image;
        if(!is_null($image) && file_exists('images/imageCategory/'.$image)){
            unlink('images/imageCategory/'.$image);
        }
        $productData = Product::find((int)$id);
        $productData->delete();

        // $result = DB::table('product_categories')->delete($id);
        // $message = $result ? "Xoá thành công" : "Xoá thất bại";
        return redirect()->route('admin.product_category.index')->with('message', 'Xoá thành công!!');
    }
}
