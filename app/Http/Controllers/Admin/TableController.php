<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTableRequest;
use App\Http\Requests\UpdateTableRequest;
use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::withTrashed()->get();
        return view('admin.pages.table.index', ['tables' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pages.table.addtable');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTableRequest $request)
    {
        $table = new Table();
        $table->name = $request->name;
        $table->status = $request->status;
        $table->area = $request->area;
        $table->save();
        return redirect()->route('admin.table.index', ['message' => 'Tao ban thanh cong']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $table = Table::find($id);
        return view('admin.pages.table.detailtable', ['table' => $table]);
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
    public function update(UpdateTableRequest $request, string $id)
    {
        $table = Table::find((int)$id);
        $table->name = $request->name;
        $table->status = $request->status;
        $table->area = $request->area;
        $table->save();
        return redirect()->route('admin.table.index', ['message' => 'Cap nhat thanh cong']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $table = Table::find((int)$id);
        $table->delete();
        return redirect()->route('admin.table.index')->with('message', 'Xoá thành công!');
    }
    public function restore(string $id)
    {

        $table = Table::withTrashed()->find($id);
        $table->restore();
        return redirect()->route('admin.table.index')->with('message', 'Khôi phục thành công!');
    }
}
