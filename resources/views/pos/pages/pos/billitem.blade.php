<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .bill {
            width: 350px;
            {{--  height: 800px;  --}} border: 1px solid #000;
            padding: 10px;
        }

        .info {
            width: 100%;
            text-align: center;
            {{--  border: 1px solid #000;  --}}
        }

        .info h4 {
            font-size: 20px;
            margin: 10px 0;
            padding: 0;
        }

        .info .infotime {
            display: flex;
            justify-content: space-between;
            font-size: 20px;

        }

        .info .infotime h5 {
            margin: 5px;
            padding: 0;
        }

        .carditem {
            width: 100%;
            text-align: center;
            margin-top: 10px;

        }

        .carditem table th {
            width: 100%;
            border: 1px solid black;
            padding: 5px 10px;
        }

        .carditem table td {
            width: 100%;
            border: 1px solid black;
            padding: 8px 10px;
        }

        .carditem table {
            width: 100%;
            border-collapse: collapse;
        }

        .total h5 {
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
                            <div>
                                <h4>Table: {{ $order->table->name }}</h4>
                            </div>
                            <div class="infotime">
                                <h5>Day: {{ $order->created_at->format('Y-m-d') }}</h5>
                                <h5>Time: {{ $order->updated_at->format('H:i:s') }}</h5>
                            </div>
                            <div class="infotime">
                                <h5>Cashier: {{ Auth::user()->name }}</h5>
                                <h5>Guestname: {{ $order->guestname }}</h5>
                            </div>
                        </div>
                        <div class="carditem">
                            <table class="tableitem">
                                <thead>
                                    <tr>
                                        <th colspan="1">Products</th>
                                        <th colspan="1">Qty</th>
                                        {{--  <th colspan="1">Price</th>
                                                <th colspan="1">Total</th>  --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalItems = 0;
                                    @endphp
                                    @foreach ($order->order_items as $item)
                                        <tr>
                                            <td>{{ $item->product_name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            {{--  <td>{{ number_format($item->product_price) }}</td>
                                                    <td>{{ number_format($item->product_price * $item->qty)}}</td>  --}}
                                        </tr>
                                        @php
                                            $totalItems += $item->qty; // Tính tổng số lượng
                                        @endphp
                                    @endforeach
                                    <tr>
                                        <td colspan="2" class="total">
                                            <h5>Total Item: {{ $totalItems }}</h5>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>

</html>
