<?php $page = 'index-four'; ?>
@extends('pos.layout.master')
@section('content')
    <div class="page-wrapper page-wrapper-four" style="margin: 0">
        <div class="content" style="width: 100%">
            {{--  <div style="margin-bottom: 20px" class="d-flex justify-content-between align-items-center">
                <h3>1st Floor</h3>
                <h3>2st Floor</h3>
                <h3>3st Floor</h3>
            </div>  --}}
            <div class="row">
                <div class="col-sm-12 mb-4">
                    <h3 class="page-title">Map table</h3>
                </div>
            </div>
            <!-- Button trigger modal -->
            <div class="row">
                @foreach ($tables as $table)
                    @php
                        $orderForTable = $orders->where('table_id', $table->id)->first();
                    @endphp
                    <div class="col-lg-2 col-sm-12 col-12 d-flex">
                        <div class="card flex-fill">
                            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                                <h4 class="card-title mb-0">Số bàn: {{ $table->name }}</h4>
                            </div>
                            <div class="card-header pb-0">
                                @if ($orderForTable)
                                    @if ($orderForTable->status === 'neworder')
                                        <h4 class="card-title mb-0 btn btn-primary">Create_at:
                                            {{ $orderForTable->created_at->format('H:i:s') }}
                                        </h4>
                                    @else
                                        <h4 class="card-title mb-0 btn btn-success">Update_at:
                                            {{ $orderForTable->updated_at->format('H:i:s') }}
                                        </h4>
                                    @endif
                                @else
                                    <h4 class="card-title mb-0">-----</h4>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table-responsive dataview">
                                    @if ($orderForTable)
                                        <h6>Total: {{ number_format($orderForTable->total) }}</h6>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive messenger" id="{{ $table->name }}">
                                    <!-- Thêm một phần tử để hiển thị thông báo -->
                                    <div id="notifications"></div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
@section('js-custom')
    <script type="text/javascript">
        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
            cluster: 'ap1',
            encrypted: true
        });

        // Subscribe to the channel we specified in our Laravel Event
        const channel = pusher.subscribe('Notify');
        // Bind a function to a Event (the full Laravel class)
        channel.bind('send-message', function(data) {
            const existingNotifications = notifications.html();
            const newNotificationHtml = `
        <div class="notification">
            <p>${data.title}</p>
        </div>
        `;
        });
    </script>
@endsection
