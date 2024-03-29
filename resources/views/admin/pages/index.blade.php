<?php $page="index-four";?>
@section('title')
<title>Dreams Pos Dashboard</title>
@endsection
@extends('admin.layout.master')
@section('content')
<div class="page-wrapper page-wrapper-four">
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span><img src="{{URL::asset('assets/img/icons/dash2.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters">{{ number_format($totalFromStartOfMonth) }}</span> đ</h5>
                        <h6>Total Sales Month</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span><img src="{{URL::asset('assets/img/icons/dash2.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters">{{ number_format($totalToday) }}</span> đ</h5>
                        <h6>Total Sales To Day</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash1">
                    <div class="dash-widgetimg">

                        <span><img src="{{URL::asset('assets/img/icons/dash1.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5 ><span class="counters" data-count="{{ $totalOrdersToDay }}">{{ $totalOrdersToDay }}</span> Order</h5>
                        <h6>Total Order Today</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash3">
                    <div class="dash-widgetimg">
                        <span><img src="{{URL::asset('assets/img/icons/dash3.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5 ><span class="counters" data-count="{{ $totalCancelledOrdersToday }}">{{ $totalCancelledOrdersToday }}</span> Order cancel</h5>
                        <h6>Order Cancel Today</h6>
                    </div>
                </div>
            </div>
            {{--  <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>{{ number_format($totalFromStartOfMonth) }}đ</h4>
                        <h5>Total Sales Month</h5>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>100</h4>
                        <h5>Suppliers</h5>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4>100</h4>
                        <h5>Purchase Invoice</h5>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das3">
                    <div class="dash-counts">
                        <h4>105</h4>
                        <h5>Sales Invoice</h5>
                    </div>

                </div>
            </div>  --}}
        </div>
        <!-- Button trigger modal -->

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Purchase & Sales</h5>
                    </div>
                    <div class="card-body">
                        <div id="curve_chart" style="width: 900px; height: 500px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Purchase & Sales</h5>
                    </div>
                    <div class="card-body">
                        <div id="order-summary" style="width: 600px; height: 400px;"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Bestsale To Day</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive dataview">
                            <table class="table datatable ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Product name</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($bestsellingProducts as $bestsellingProduct)
                                    <tr>
                                        <td>{{ $loop->iteration  }}</td>
                                        <td class="productimgname">
                                            @php
                                                $imagesLink = is_null($bestsellingProduct->product->image)
                                                || !file_exists('images/imageProduct/' . $bestsellingProduct->product->image)
                                                ? 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                                                : asset('images/imageProduct/' . $bestsellingProduct->product->image);
                                            @endphp
                                            <a class="product-img">
                                            <img src="{{ $imagesLink }}" alt="{{ $bestsellingProduct->product->name }}" width="70"
                                                height="70">
                                            </a>
                                            <a href="{{url('productlist')}}">{{ $bestsellingProduct->product->name }}</a>
                                        </td>
                                        <td>{{ $bestsellingProduct->total_quantity }}</td>
                                        <td>{{ $bestsellingProduct->total_quantity * $bestsellingProduct->product->price }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-0">


        </div>
    </div>
</div>
@endsection
@section('js-custom')
<script type="text/javascript">
    google.charts.load('current', {'packages':['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable(@json($arrayDatas));

      var options = {
        title: 'Sales in 7 day',
        curveType: 'function',
        legend: { position: 'bottom' }
      };

      var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      chart.draw(data, options);
      var data = google.visualization.arrayToDataTable(@json($arrayDatasStatus));
        var options = {
            title: 'Order Summary',
            is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('order-summary'));
        chart.draw(data, options);
    }
  </script>
@endsection
