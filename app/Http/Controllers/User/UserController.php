<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function home()
    {
        return view('welcome');
    }

    public function getLogin()
    {
        return view('auth\login');
    }
}
