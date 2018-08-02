<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\userRegisterFormRequest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function getLoginVendor()
    {
        return view('auth.vendorLogin');
    }

    public function getVendorRegister()
    {
        return view('auth.vendorRegister');
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $role = Auth::user()->role;
            if ($role == 2) {
                $errors = new MessageBag(['errorlogin' => __('Người Dùng Không Hợp Lệ')]);
                $this->logout($request);

                return redirect()->action('Auth\LoginController@getLogin')->withInput()->withErrors($errors);
            }
            if ($role == 1) {
                return redirect()->route('getHome');
            }

            return redirect()->intended('/');
        } else {
            $errors = new MessageBag(['errorlogin' => __('Email hoặc mật khẩu không đúng')]);

            return redirect()->back()->withInput()->withErrors($errors);
        }
    }

    public function postLoginVendor(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $role = Auth::user()->role;
            if ($role == 1) {
                $errors = new MessageBag(['errorlogin' => __('Người Dùng Không Hợp Lệ')]);
                $this->logout($request);

                return redirect()->action('Auth\LoginController@getLoginVendor')->withInput()->withErrors($errors);
            } else {
                if ($role == 2) {
                    return view('/home');
                }
            }

            return redirect()->intended('/');
        } else {
            $errors = new MessageBag(['errorlogin' => __('Email hoặc mật khẩu không đúng')]);

            return redirect()->back()->withInput()->withErrors($errors);
        }
    }
}
