<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    //Chay Khi vao login va da dang nhap truoc
    public function handle($request, Closure $next, $guard = null)
    {
        $uri = $request->getRequestUri();
        if (Auth::guard($guard)->check()) {
            if($uri == '/trumsan/public/register' || $uri == '/trumsan/public/vendorRegister')
            {
                $errors = new MessageBag(['errorRegister' => __('Bạn Cần Đăng Xuất Trước Khi Đăng Kí')]);

                return redirect()->route('getHome')->withInput()->withErrors($errors);
            }

            return redirect('/');
        }

        return $next($request);

    }
}
