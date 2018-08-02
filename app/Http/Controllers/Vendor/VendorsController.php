<?php

namespace App\Http\Controllers\Vendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class VendorsController extends Controller
{
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //
    public function home()
    {
        return view('vendors.shared.master');
    }

}
