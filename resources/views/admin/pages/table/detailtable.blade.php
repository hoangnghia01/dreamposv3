<?php $page = 'add'; ?>
@extends('admin.layout.master')
@section('title')
    <title>Detail Cashier</title>
@endsection
@section('content')
    <div class="page-wrapper cardhead">
        <div class="content container-fluid">
            @component('components.pageheader')
                @slot('title')
                    Detail Cashier
                @endslot
            @endcomponent
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin.table.update', ['table' => $table]) }}" method="POST">
                                <div class="form-group">
                                    <label>Table name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $table->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status"> Status</label>
                                    <select class="select" name="status" id="status">
                                        <option {{ $table->status === 0 ? 'selected' : '' }} value="0">Hide
                                        </option>
                                        <option {{ $table->status === 1 ? 'selected' : '' }} value="1">Show
                                        </option>
                                    </select>
                                </div>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group">
                                    <label for="area">Area</label>
                                    <select class="select" name="area" id="area">
                                        <option {{ $table->area === 'take away' ? 'selected' : '' }} value="take away">Take away</option>
                                        <option {{ $table->area === '1st' ? 'selected' : '' }} value="1st">1 St</option>
                                        <option {{ $table->area === '2st' ? 'selected' : '' }} value="2st">2 St</option>
                                        <option {{ $table->area === '3st' ? 'selected' : '' }} value="3st">3 St</option>
                                    </select>
                                    @error('area')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                                @method('put')
                                @csrf
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
