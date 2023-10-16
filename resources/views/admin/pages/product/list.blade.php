<?php $page = 'productlist'; ?>
@extends('admin.layout.master')
@section('title')
    <title>Product Lists</title>
@endsection
@section('content')
    <div class="page-wrapper">

        <div class="content">
            <div class="page-title"
                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h4 style="display: inline-block;">Product Lists</h4>
                <a href="{{ route('admin.product.create') }}" style="display: inline-block;" type="button"
                    class="btn btn-outline-primary mr-1 mb-1">
                    + Add Product
                </a>
            </div>
            @if (session('message'))
                <div class="col-sm-12 alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <!-- /product list -->
            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ URL::asset('/assets/img/icons/filter.svg') }}" alt="img">
                                    <span><img src="{{ URL::asset('/assets/img/icons/closes.svg') }}" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img
                                        src="{{ URL::asset('/assets/img/icons/search-white.svg') }}" alt="img"></a>
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                            src="{{ URL::asset('/assets/img/icons/pdf.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                            src="{{ URL::asset('/assets/img/icons/excel.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                            src="{{ URL::asset('/assets/img/icons/printer.svg') }}" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="card mb-0" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="row">
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Choose Product</option>
                                                    <option>Macbook pro</option>
                                                    <option>Orange</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Choose Category</option>
                                                    <option>Computers</option>
                                                    <option>Fruits</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Choose Sub Category</option>
                                                    <option>Computer</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Brand</option>
                                                    <option>N/D</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg col-sm-6 col-12 ">
                                            <div class="form-group">
                                                <select class="select">
                                                    <option>Price</option>
                                                    <option>150.00</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 col-sm-6 col-12">
                                            <div class="form-group">
                                                <a class="btn btn-filters ms-auto"><img
                                                        src="{{ URL::asset('/assets/img/icons/search-whites.svg') }}"
                                                        alt="img"></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Product Name</th>
                                    <th>Category </th>
                                    <th>Price</th>
                                    <th>Discount price</th>
                                    {{--  <th>Unit</th>  --}}
                                    <th>Qty</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td class="productimgname">
                                            @php
                                                $imagesLink = is_null($product->image) || !file_exists('images/imageProduct/' . $product->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/imageProduct/' . $product->image);
                                            @endphp
                                            <aclass="product-img">
                                            <img src="{{ $imagesLink }}" alt="{{ $product->name }}" width="70"
                                                height="70">
                                            </aclass=>
                                            <a>{{ $product->name }}</a>
                                        </td>
                                        <td>{{ $product->product_category->name }}</td>
                                        <td>{{ number_format($product->price, 2) }}</td>
                                        <td>{{ number_format($product->discount_price, 2) }}</td>
                                        {{--  <td>{{ $product->unit->name }}</td>  --}}
                                        <td>{{ $product->qty }}</td>
                                        <td>
                                            <div
                                                class="{{ $product->status == 1 ? 'btn btn-outline-primary mr-1 mb-1' : 'btn btn-outline-danger mr-1 mb-1' }}">
                                                {{ $product->status == 1 ? 'SHOW' : 'HIDE' }}
                                            </div>
                                        </td>
                                        <td>
                                            {{--  <a class="me-3" href="{{ url('product-details') }}">
                                                <img src="{{ URL::asset('/assets/img/icons/eye.svg') }}" alt="img">
                                            </a>  --}}
                                            <div style="display: flex; justify-content: space-around; align-items: center;">
                                                <a class="me-3"
                                                    href="{{ route('admin.product.show', ['product' => $product->id]) }}">
                                                    <img src="{{ URL::asset('/assets/img/icons/edit.svg') }}"
                                                        alt="img">
                                                </a>

                                                @if (!is_null($product->deleted_at))
                                                    <a href="{{ route('admin.product.restore', ['product' => $product->id]) }}"
                                                        class="btn btn-outline-primary mr-1 mb-1"
                                                        style="display: flex; justify-content: space-between; align-items: center;">
                                                        <img src="{{ URL::asset('/assets/img/icons/return1.svg') }}"
                                                            alt="img">
                                                    </a>
                                                @else
                                                    <form
                                                        action="{{ route('admin.product.destroy', ['product' => $product->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-primary mr-1 mb-1"
                                                            style="display: flex; justify-content: space-between; align-items: center;"
                                                            onclick="return confirm('Are you sure?')">
                                                            <img src="{{ URL::asset('/assets/img/icons/delete.svg') }}"
                                                                alt="img">
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
@endsection
