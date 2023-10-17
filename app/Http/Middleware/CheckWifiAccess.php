<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckWifiAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allowedIps = ['192.168.1.4', '127.0.0.1', '192.168.1.7', '192.168.1.5'];
         // Thay thế bằng danh sách các địa chỉ IP của WiFi được cho phép

        //  $allowedIps = ['test'];
        if (in_array($request->ip(), $allowedIps)) {
            return $next($request);
        } else {
            abort(403, 'Vui lòng đăng nhập wifi để tiếp tục');
        }
    }
}
