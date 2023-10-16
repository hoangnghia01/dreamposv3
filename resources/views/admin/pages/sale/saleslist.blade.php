<?php $page = 'saleslist'; ?>
@section('title')
    <title>Sales List</title>
@endsection
@extends('admin.layout.master')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            @component('components.pageheader')
                @slot('title')
                    Sales List
                @endslot
                @slot('title_1')
                    Manage your sales
                @endslot
            @endcomponent
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
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{ URL::asset('/assets/img/icons/excel.svg')}}" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{ URL::asset('/assets/img/icons/printer.svg')}}" alt="img"></a>
                            </li>
                        </ul>
                    </div>  --}}
                    </div>
                    <!-- /Filter -->
                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Reference No">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Completed</option>
                                            <option>Paid</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
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
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    {{--  <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th>  --}}
                                    <th>No</th>
                                    <th>Customer Name</th>
                                    <th>Table</th>
                                    <th>Date</th>
                                    <th>Order ID</th>
                                    <th>Status</th>
                                    {{--  <th>Payment</th>  --}}
                                    <th>Total</th>
                                    <th>Paid</th>

                                    <th>Biller</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                    <tr>
                                        {{--  <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>  --}}
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $order->guestname ? $order->guestname : $order->table->name }}</td>
                                        <td>{{ $order->table->name ?  $order->table->name : ""}}</td>
                                        <td>{{ $order->created_at }}</td>
                                        <td>{{ $order->id }}</td>
                                        {{--  <span class="badges bg-lightred">Pending</span>  --}}
                                        <td><span class="
                                            @if($order->status === 'pending')
                                                badges bg-lightyellow
                                            @elseif($order->status === 'success')
                                                badges bg-lightgreen
                                            @elseif($order->status === 'shipping')
                                                badges bg-lightpurple
                                            @endif
                                            ">{{ $order->status }}</span></td>
                                        {{--  <td><span class="badges bg-lightgreen">Paid</span></td>  --}}


                                        <td class="text-red">{{ $order->total }}</td>
                                        <td>0.00</td>
                                        <td>{{ $order->created_by }}</td>
                                        <td>
                                            <a href="{{ route('admin.salesdetail', ['salesid' => $order->id]) }}">
                                                <img
                                                src="{{ URL::asset('/assets/img/icons/eye1.svg') }}"
                                                class="me-2" alt="img">
                                            </a>
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
    @component('components.modal-popup')
    @endcomponent
@endsection
