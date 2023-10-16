<?php

namespace App\Listeners;

use App\Events\ConfirmOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOrderToKitchen
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ConfirmOrder $event)
    {
        $order = $event->order;
        $pdf = app('dompdf.wrapper');
        // $order = Order::find($order_id);
        return view('pos.pages.pos.bill', ['order' => $order]);
        // $pdf->loadView('pos.pages.pos.bill', ['order' => $order]);
        // return $pdf->stream('bill.pdf');
    }
}
