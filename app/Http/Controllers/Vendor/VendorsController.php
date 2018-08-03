<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorsController extends Controller
{

    public function home()
    {
        return view('welcome');
    }

    public function showLoginForm()
    {
        return view('auth/vendorLogin');
    }
}
