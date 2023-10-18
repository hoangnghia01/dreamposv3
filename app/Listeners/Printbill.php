<?php

namespace App\Listeners;

use App\Events\ConfirmOrder;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Printbill
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
        // return view('pos.pages.pos.bill', ['order' => $order]);
        $pdf->loadView('pos.pages.pos.bill', ['order' => $order]);
        // return $pdf->stream('bill.pdf');

        // Tạo đường dẫn đầy đủ đến thư mục lưu trữ PDF trên máy chủ
        $pdfPath = public_path('bills/'); // Thay đổi 'pdfs/' thành đường dẫn thư mục bạn muốn lưu trữ tệp PDF

        // Kiểm tra xem thư mục đã tồn tại chưa, nếu chưa thì tạo mới
        if (!file_exists($pdfPath)) {
            mkdir($pdfPath, 0755, true);
        }
        // Tạo tên tệp PDF duy nhất (ví dụ: timestamp.pdf)
        $pdfFileName = $order->id . time() . '.pdf';

        // Lưu tệp PDF vào thư mục đã tạo
        $pdf->output();
        $pdf->save($pdfPath . $pdfFileName);
        return response()->file($pdfPath . $pdfFileName);
    }
}
