<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCashierRequest;
use App\Http\Requests\UpdateCashierRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CashierController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = DB::table('users')->where('role', '=', 'user_cashier')->get();
        return view('admin.pages.cashiercreate.listscashier', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.cashiercreate.addcashier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCashierRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = $request->password;
        $user->password = Hash::make($request->password);
        $user->role = User::USER_CASHIER;
        $user->save();
        return redirect()->route('admin.cashier.index')->with('message', 'Tạo thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cashier = User::find($id);
        return view('admin.pages.cashiercreate.detailcashier', ['cashier' => $cashier]);
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
    public function update(UpdateCashierRequest $request, string $id){
        $cashier = User::find($id);
        $cashier->name = $request->name;
        $cashier->email = $request->email;
        $cashier->password = $request->password;
        $check = $cashier->save();
        $message = $check > 0 ? 'Cập nhật thành công!' : 'Cập nhật thất bại';
        //session flash
        return redirect()
        ->route('admin.cashier.index')
        ->with('message', $message);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $cashier = User::find((int)$id);
        $cashier->delete();
        return redirect()->route('admin.cashier.index')->with('message', 'Xoá thành công!!');
    }

    public function restore(string $id){
        $cashier = User::withTrashed()->find($id);
        $cashier->restore();
        return redirect()->route('admin.cashier.index')->with('message','Khôi phục thành công!');
    }

}
