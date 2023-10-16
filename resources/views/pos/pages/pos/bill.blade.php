<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .bill{
            width: 350px;
            {{--  height: 800px;  --}}
            border: 1px solid #000;
            padding: 10px;
        }
        .info{
            width: 100%;
            text-align: center;
            {{--  border: 1px solid #000;  --}}
        }
        .tableinfo{
            text-align: center;
            width: 100%;
        }
        .tableinfo tr th{
            width: 100%;
            text-align: center;

        }
        .tableinfo h1, h2{
            margin: 0;
        }
        .info .infotime{
            display: flex;
            justify-content: space-between;
            font-size: 20px;

        }
        .info .infotime h5{
            margin: 5px;
            padding: 0;
        }
        .carditem{
            width: 100%;
            text-align: center;
            margin-top: 10px;

        }
        .carditem table th{
            width: 100%;
            border:1px solid black;
            padding:5px 10px;
        }
        .carditem table td{
            width: 100%;
            border:1px solid black;
            padding:8px 10px;
        }
        .carditem table{
            width: 100%;
            border-collapse:collapse;
        }
        .total h5{
            font-size: 17px;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
    <div class="page-wrapper page-wrapper-four" style="margin: 0">
        <div class="content" style="width: 100%">
            <!-- Button trigger modal -->
            {{--  {{ dd($order) }}  --}}
            <div class="row">
                    <div class="col-lg-3 col-sm-12 col-12 d-flex">
                        <div class="bill">
                            <div class="info">
                                <table class="tableinfo">
                                    <tr>
                                        <th colspan="4"><h1>Dream Pos</h1></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Address: 1500 Huynh Tan Phat Q7 HCM</th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Phone: 097 977 2145</th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">---------</th>
                                    </tr>
                                    <tr>
                                        <th colspan="4"><h2>Bill</h2></th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">Table: {{ $order->table->name }}</th>
                                    </tr>
                                </table>
                                <div class="infotime">
                                    <h5>Day: {{ $order->created_at->format('Y-m-d') }}</h5>
                                    <h5>Time: {{ $order->created_at->format('H:i:s') }}</h5>
                                </div>
                                <div class="infotime">
                                    <h5>Cashier: {{ Auth::user()->name }}</h5>
                                    <h5>{{ $order->created_at->format('H:i:s') }}</h5>
                                </div>
                            </div>
                            <div class="carditem">
                                    <table class="tableitem">
                                        <thead>
                                            <tr>
                                                <th colspan="1">Products</th>
                                                <th colspan="1">Qty</th>
                                                <th colspan="1">Price</th>
                                                <th colspan="1">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->order_items as $item)
                                                <tr>

                                                    <td>{{ $item->product_name }}</td>
                                                    <td>{{ $item->qty }}</td>
                                                    <td>{{ number_format($item->product_price) }}</td>
                                                    <td>{{ number_format($item->product_price * $item->qty)}}</td>

                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="1"></td>
                                                <td colspan="3" class="total">
                                                    <h5>Total: {{ number_format($order->total) }}</h5>
                                                </td>

                                            </tr>

                                        </tbody>
                                    </table>
                                    <h4>Thank You!!!</h4>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
    </div>
</body>
</html>





