<?php $page = 'pos'; ?>
@extends('pos.layout.master')
@section('content')
    <div class="page-wrapper ms-0">
        <div class="content">
            <div class="row">
                {{--  @include('pos.layout.partials.sidebar')  --}}
                <div class="col-lg-8 col-sm-10 tabs_wrapper">
                    <div class="page-header ">
                        <div class="page-title">
                            <h4>Categories</h4>
                            <h6>Manage your purchases</h6>
                        </div>
                    </div>
                    <ul class=" tabs owl-carousel owl-theme owl-product  border-0 ">
                        @foreach ($product_categories as $productCategory)
                            <li id="{{ $productCategory->id }}" class="tab_content {{ $loop->first ? 'show active' : '' }}">
                                <div class="product-details">
                                    <img src="{{ URL::asset('/assets/img/product/product62.png') }}" alt="img">
                                    <h6>{{ $productCategory->name }}</h6>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="tabs_container">
                        @foreach ($product_categories as $productCategory)
                            <div class="tab_content {{ $loop->first ? 'show active' : '' }}"
                                data-tab="{{ $productCategory->id }}">
                                <div class="row ">
                                    @foreach ($products as $product)
                                        @if ($product->product_category_id == $productCategory->id)
                                            <div class="col-lg-3 col-sm-6 d-flex ">
                                                <div class="productset flex-fill">
                                                    <div class="productsetimg">
                                                        @php
                                                            $imagesLink = is_null($product->image) || !file_exists('images/imageProduct/' . $product->image) ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg' : asset('images/imageProduct/' . $product->image);
                                                        @endphp
                                                        <img src="{{ $imagesLink }}" alt="{{ $product->name }}">
                                                        <h6>Qty: 5.00</h6>
                                                        <div class="check-product">
                                                            <i class="fa fa-check"></i>
                                                        </div>
                                                    </div>
                                                    <div class="productsetcontent">
                                                        <h5>{{ $product->name }}</h5>
                                                        <h6>${{ number_format($product->price, 2) }}</h6>
                                                        <a data-url="{{ route('product.add-to-cart', ['productId' => $product->id]) }}"
                                                            href="#" class="add-to-cart"><i
                                                                class="fa fa-shopping-cart"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="col-lg-4 col-sm-12 ">
                    <form method="post" action="{{ route('cashier.place-order') }}">
                        <div class="order-list">
                            <div class="orderid">
                                <h4>Order List</h4>

                            </div>
                            {{--  <div class="actionproducts">
                                <ul>
                                    <li>
                                        <a href="javascript:void(0);" class="deletebg confirm-text"><img
                                                src="{{ URL::asset('/assets/img/icons/delete-2.svg') }}"
                                                alt="img"></a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" data-bs-toggle="dropdown" aria-expanded="false"
                                            class="dropset">
                                            <img src="{{ URL::asset('/assets/img/icons/ellipise1.svg') }}" alt="img">
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                            data-popper-placement="bottom-end">
                                            <li>
                                                <a href="#" class="dropdown-item">Action</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown-item">Another Action</a>
                                            </li>
                                            <li>
                                                <a href="#" class="dropdown-item">Something Elses</a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>  --}}
                        </div>
                        <div class="card card-order">
                            <div class="card-body">
                                <div class="row">
                                    {{--  <div class="col-12">
                                    <a href="javascript:void(0);" class="btn btn-adds" data-bs-toggle="modal"
                                        data-bs-target="#create"><i class="fa fa-plus me-2"></i>Add Customer</a>
                                </div>  --}}
                                    <div class="col-lg-12">
                                        <div class="select-split ">
                                            <div class="select-group w-100">
                                                <select class="select" name="table_id" id="category">
                                                    <option value="">--- Please Select ---</option>
                                                    @foreach ($tables as $table)
                                                        <option value="{{ $table->id }}">{{ $table->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    {{--  <div class="col-lg-12">
                                    <div class="select-split">
                                        <div class="select-group w-100">
                                            <select class="select">
                                                <option>Product </option>
                                                <option>Barcode</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>  --}}
                                    {{--  <div class="col-12">
                                    <div class="text-end">
                                        <a class="btn btn-scanner-set"><img
                                                src="{{ URL::asset('/assets/img/icons/scanner1.svg') }}" alt="img"
                                                class="me-2">Scan bardcode</a>
                                    </div>
                                </div>  --}}
                                </div>
                            </div>
                            <div class="split-card">
                            </div>
                            <div class="card-body pt-0">
                                <div class="totalitem">
                                    <h4>Total items: <span id="total-items-cart"> {{ $total_items }}</span></h4>
                                    <a href="" class="delete-cart">Clear all</a>
                                </div>
                                <div class="product-table" id="table-cart">
                                    @php $total = 0 @endphp
                                    @foreach ($cart as $productId => $item)
                                        @php $total += $item['qty'] * $item['price'] @endphp
                                        <ul class="product-lists updatelist" id="{{ $productId }}">
                                            <li class="shoping__cart__item">
                                                <div class="productimg">
                                                    <div class="productimgs">
                                                        <img src="{{ $item['image'] ?? '' }}" alt="">
                                                    </div>
                                                    <div class="productcontet">
                                                        <h4>{{ $item['name'] }}
                                                        </h4>
                                                        <div class="productlinkset">
                                                            <h5>PT001</h5>
                                                        </div>
                                                        <div class="increment-decrement">
                                                            <div class="input-groups" data-id="{{ $productId }}"
                                                                data-price="{{ $item['price'] }}">
                                                                <input type="button" value="-"
                                                                    data-url="{{ route('product.update-to-cart', ['productId' => $productId, 'num' => -1]) }}"
                                                                    class="button-minus dec button">
                                                                <input type="text" value="{{ $item['qty'] }}"
                                                                    class="quantity-field">
                                                                <input type="button" value="+"
                                                                    data-url="{{ route('product.update-to-cart', ['productId' => $productId, 'num' => 1]) }}"
                                                                    class="button-plus inc button ">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="shoping__cart__total">
                                                {{ number_format($item['qty'] * $item['price']) }} đ</li>
                                            <li>
                                                <a class="icon_close" data-id="{{ $productId }}"
                                                    data-url="{{ route('product.delete-item-to-cart', ['productId' => $productId]) }}">
                                                    <img src="{{ URL::asset('/assets/img/icons/delete-2.svg') }}"
                                                        alt="img">
                                                </a>
                                            </li>
                                        </ul>
                                    @endforeach
                                </div>
                            </div>
                            <div class="split-card">
                            </div>
                            <div class="card-body pt-0 pb-2">
                                <div class="setvalue">
                                    <ul>
                                        <li>
                                            <h5>Subtotal </h5>
                                            <h6 id="cart-subtotal">{{ number_format($total) }} đ</h6>
                                        </li>
                                        {{--  <li>
                                        <h5>Tax </h5>
                                        <h6>5.00$</h6>
                                    </li>  --}}
                                        <li class="total-value">
                                            <h5>Total </h5>
                                            <h6 id="cart-total">{{ number_format($total) }} đ</h6>
                                        </li>
                                    </ul>
                                </div>
                                {{--  <div class="setvaluecash">
                                    <ul>
                                        <li>
                                            <a href="javascript:void(0);" class="paymentmethod">
                                                <img src="{{ URL::asset('/assets/img/icons/cash.svg') }}" alt="img"
                                                    class="me-2">
                                                Cash
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="paymentmethod">
                                                <img src="{{ URL::asset('/assets/img/icons/debitcard.svg') }}"
                                                    alt="img" class="me-2">
                                                Debit
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="paymentmethod">
                                                <img src="{{ URL::asset('/assets/img/icons/scan.svg') }}" alt="img"
                                                    class="me-2">
                                                Scan
                                            </a>
                                        </li>
                                    </ul>
                                </div>  --}}
                                <div >
                                    <button class="btn btn-outline-primary mr-1 mb-1" type="submit" style="width: 100%; height: 100%;">Checkout</button>

                                </div>
                                {{--  <div class="btn-pos">
                                    <ul>
                                        <li>
                                            <a class="btn"><img src="{{ URL::asset('/assets/img/icons/pause1.svg') }}"
                                                    alt="img" class="me-1">Hold</a>
                                        </li>
                                        <li>
                                            <a class="btn"><img src="{{ URL::asset('/assets/img/icons/edit-6.svg') }}"
                                                    alt="img" class="me-1">Quotation</a>
                                        </li>
                                        <li>
                                            <a class="btn"><img
                                                    src="{{ URL::asset('/assets/img/icons/trash12.svg') }}"
                                                    alt="img" class="me-1">Void</a>
                                        </li>
                                        <li>
                                            <a class="btn"><img
                                                    src="{{ URL::asset('/assets/img/icons/wallet1.svg') }}"
                                                    alt="img" class="me-1">Payment</a>
                                        </li>
                                        <li>
                                            <a class="btn" data-bs-toggle="modal" data-bs-target="#recents"><img
                                                    src="{{ URL::asset('/assets/img/icons/transcation.svg') }}"
                                                    alt="img" class="me-1"> Transaction</a>
                                        </li>
                                    </ul>
                                </div>  --}}
                            </div>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    @component('components.modal-popup')
    @endcomponent
@endsection
@section('js-custom')
    <script>
        $(document).ready(function() {
            $('.add-to-cart').on('click', function(event) {
                event.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                    method: 'get',
                    url: url,
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                        });
                        reloadView(response);
                        location.reload()
                    },
                    statusCode: {
                        401: function() {
                            window.location.href = '{{ route('login') }}';
                        },
                        404: function() {
                            Swal.fire({
                                icon: 'error',
                                text: "Can't add product to cart",
                            });
                        },
                    },
                });
            });


            $('.icon_close').on('click', function() {
                var url = $(this).data('url');
                var id = $(this).data('id');
                $.ajax({
                    method: 'get',
                    url: url,
                    data: {
                        'name': '1'
                    },
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                        });
                        reloadView(response);
                        {{--  $('ul#' + id).empty();  --}}
                        $('ul#' + id).remove();
                    }
                });
            });
            $('.input-groups').on('click', '.button-minus, .button-plus', function() {
                var button = $(this);
                var id = button.closest('.input-groups').data('id');
                var qtyField = button.siblings('.quantity-field');
                var qty = parseInt(qtyField.val());
                var url = button.data('url');
                var price = parseFloat(button.closest('.input-groups').data('price'));
                console.log(qty)
                var totalPrice = price * qty;

                $.ajax({
                    method: 'GET',
                    url: url,
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                        });
                        if (qty === 0) {
                            $('ul#' + id).remove();
                        }
                        $('ul#' + id + ' .shoping__cart__total').html("$" + totalPrice.toFixed(
                            2).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
                        reloadView(response);
                    }
                });
            });

            $('.delete-cart').on('click', function(event) {
                event.preventDefault();
                $.ajax({
                    method: 'get',
                    url: '{{ route('product.delete-to-cart') }}',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            text: response.message,
                        });

                        reloadView(response);
                        $('#table-cart').empty();
                    }
                });
            });
        });

        function reloadView(response) {
            $('#total-items-cart').html(response.total_items);
            $('#total-price-cart').html('$' + response.total_price.toFixed(2)
                .replace(
                    /(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));

            $('#cart-subtotal').html('$' + response.total_price.toFixed(
                2).replace(
                /(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
            $('#cart-total').html('$' + response.total_price.toFixed(
                2).replace(
                /(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        }
    </script>
@endsection
