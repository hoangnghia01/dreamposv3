<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.403', [], 403); // Trả về trang lỗi 404 tùy chỉnh
        }
        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', [], 404); // Trả về trang lỗi 404 tùy chỉnh
        }
        // Trả về trang lỗi 500 tùy chỉnh
        // if ($exception instanceof \Exception) {
        //     return response()->view('errors.500', [], 500);
        // }

        return parent::render($request, $exception);
    }
}
