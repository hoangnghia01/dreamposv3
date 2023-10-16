<?php $page = 'index-four'; ?>
@extends('pos.layout.master')
@section('title')
    <title>List Bills</title>
@endsection
@section('content')
    <div class="page-wrapper page-wrapper-four" style="margin: 0">
        <div class="content" style="width: 100%">
            <!-- Button trigger modal -->
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <h3 class="page-title">List Bill</h3>
                </div>
            </div>
            @if (empty($orders))
                <div class="row">
                    <div class="col-sm-12">
                        <h5 class="page-title">Not new order!!</h5>
                    </div>
                </div>
            @endif
            <div class="row">
                @foreach ($orders as $order)
                    <div class="col-lg-3 col-sm-6 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Table: {{ $order->table_id }}</h4>
                                <div class="btn btn-{{ $order->status === 'neworder' ? 'primary' : 'success' }}">
                                    {{ $order->status }}
                                </div>
                            </div>
                            <div class="card-header pb-0">
                                <h5 class="card-title mb-0">Bill id: {{ $order->id }}</h5>
                                <h6 class="card-title mb-0">Time: {{ $order->created_at->format('H:i:s') }}</h6>
                                {{--  <h5 class="card-title mb-0">Id:</h5>  --}}
                            </div>

                            <div class="table-responsive dataview">
                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Products</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->order_items as $item)
                                            <tr>

                                                <td>{{ $item->product_name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ number_format($item->product_price) }}</td>
                                                <td>{{ number_format($item->product_price * $item->qty) }}</td>
                                                {{--  <td>{{ number_format($item->product_price * $item->qty, 2) }}</td>  --}}
                                            </tr>
                                        @endforeach

                                        <tr>
                                            <td colspan="4">
                                                <h6 class="d-flex justify-content-flex-end align-items-center"
                                                    style="width: 100%">Total: {{ number_format($order->total) }}</h6>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="card-body d-flex justify-content-between align-items-center">
                                    @if ($order->status === 'neworder')
                                        <a href="{{ route('cashier.confirmbill', ['order_id' => $order->id]) }}"
                                            class="btn btn-outline-primary mr-1 mb-1" id="confirm-text">Confirm Order</a>
                                    @else
                                        <a href="{{ route('cashier.printbill', ['order_id' => $order->id]) }}"
                                            class="btn btn-outline-primary mr-1 mb-1" id="confirm-text">Print Bill</a>
                                        <a href="{{ route('cashier.successbill', ['order_id' => $order->id]) }}"
                                            class="btn btn-outline-success mr-1 mb-1" id="confirm-text">Success</a>
                                    @endif
                                    <a href="{{ route('cashier.cancelbill', ['order_id' => $order->id]) }}"
                                        class="btn btn-outline-danger mr-1 mb-1" id="confirm-text">Cancel</a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
