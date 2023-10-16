<?php $page = 'categorylist'; ?>
@extends('admin.layout.master')
@section('title')
    <title>Product Category Lists</title>
@endsection
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-title"
                style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <h4 style="display: inline-block;">Review</h4>
                {{--  <a href="{{ route('admin.product_category.create') }}" style="display: inline-block;" type="button"
                    class="btn btn-outline-primary mr-1 mb-1">
                    + Add Categoty
                </a>  --}}
            </div>
            {{--  @if (session('message'))
                        <div class="col-sm-12 alert alert-success">
                            {{ session('message') }}
                        </div>
            @endif  --}}
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
                        {{--  <div class="wordset">
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
                        </div>  --}}
                    </div>
                    <!-- /Filter -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        {{--  <select class="select">
                                        <option>Choose Category</option>
                                        <option>Computers</option>
                                    </select>  --}}
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Sub Category</option>
                                            <option>Fruits</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Sub Brand</option>
                                            <option>Iphone</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img
                                                src="{{ URL::asset('/assets/img/icons/search-whites.svg') }}"
                                                alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Filter -->
                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    {{--  <th>
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>  --}}
                                    <th>No</th>
                                    <th>Guest name</th>
                                    <th>Table</th>
                                    <th>Rating</th>
                                    <th>Reason</th>
                                    <th>OtherReason</th>
                                    {{--  <th>Created By</th>  --}}
                                    <th>Created_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($review as $review)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $review->guestname }}</td>
                                        <td>{{ $review->table_id }}</td>
                                        <td>
                                            @if ($review->rating)
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <span>&#9733;</span> <!-- Dấu sao đầy -->
                                                    @else
                                                        <span>&#9734;</span> <!-- Dấu sao rỗng -->
                                                    @endif
                                                @endfor
                                            @else
                                                ---
                                            @endif
                                        </td>
                                        <td>{{ $review->selectedReason ? $review->selectedReason : '---' }}</td>
                                        <td>{{ $review->otherReason ? $review->otherReason : '---' }}</td>
                                        <td>{{ $review->created_at }}</td>
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
