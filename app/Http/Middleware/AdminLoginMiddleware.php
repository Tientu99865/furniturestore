<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('web')->check()){
            $user = Auth::guard('web')->user();
            return $next($request);
//            if ($user->role_id == null)
//                return $next($request);
//            else
//                return redirect('admin/dangnhap')->with('Loi','Bạn chưa có quyền để đăng nhập vào trang admin!');
        }else{
            return redirect('admin/dangnhap')->with('Loi','Vui lòng đăng nhập');
        }


    }
}
