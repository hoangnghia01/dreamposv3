<?php $page="index-four";?>
@extends('pos.layout.master')
@section('content')
<div class="page-wrapper page-wrapper-four" style="margin: 0">
    <div class="content" style="width: 100%">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash1">
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
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span><img src="{{URL::asset('assets/img/icons/dash1.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5 >$<span class="counters" data-count="307144.00">$307,144.00</span></h5>
                        <h6>Total Purchase Due</h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash2">
                    <div class="dash-widgetimg">
                        <span><img src="{{URL::asset('assets/img/icons/dash3.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5 >$<span class="counters" data-count="385656.50">385,656.50</span></h5>
                        <h6>Total Sale Amount</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash3">
                    <div class="dash-widgetimg">
                        <span><img src="{{URL::asset('assets/img/icons/dash4.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5 >$<span class="counters" data-count="40000.00">400.00</span></h5>
                        <h6>Total Sale Amount</h6>
                    </div>
                </div>
            </div>
            {{--  <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>100</h4>
                        <h5>Customers</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>100</h4>
                        <h5>Suppliers</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user-check"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4>100</h4>
                        <h5>Purchase Invoice</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file-text"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das3">
                    <div class="dash-counts">
                        <h4>105</h4>
                        <h5>Sales Invoice</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file"></i>
                    </div>
                </div>
            </div>  --}}
        </div>
        <!-- Button trigger modal -->

        <div class="row">
            <div class="col-lg-8 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Purchase & Sales</h5>
                    </div>
                    <div class="card-body">
                        <div id="curve_chart" style="width: 900px; height: 500px"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">Bestsale To Day</h4>

                    </div>
                    <div class="card-body">
                        <div class="table-responsive dataview">
                            <table class="table datatable ">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th>Products</th>
                                        <th>Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="productimgname">
                                            <a href="{{url('productlist')}}" class="product-img">
                                                <img src="{{URL::asset('assets/img/product/product22.jpg')}}" alt="product">
                                            </a>
                                            <a href="{{url('productlist')}}">Apple Earpods</a>
                                        </td>
                                        <td>$891.2</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td class="productimgname">
                                            <a href="{{url('productlist')}}" class="product-img">
                                                <img src="{{URL::asset('assets/img/product/product23.jpg')}}" alt="product">
                                            </a>
                                            <a href="{{url('productlist')}}">iPhone 11</a>
                                        </td>
                                        <td>$668.51</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td class="productimgname">
                                            <a href="{{url('productlist')}}" class="product-img">
                                                <img src="{{URL::asset('assets/img/product/product24.jpg')}}" alt="product">
                                            </a>
                                            <a href="{{url('productlist')}}">samsung</a>
                                        </td>
                                        <td>$522.29</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td class="productimgname">
                                            <a href="{{url('productlist')}}" class="product-img">
                                                <img src="{{URL::asset('assets/img/product/product6.jpg')}}" alt="product">
                                            </a>
                                            <a href="{{url('productlist')}}">Macbook Pro</a>
                                        </td>
                                        <td>$291.01</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-0">
            <div class="card-body">

            </div>
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
    }
  </script>
@endsection
