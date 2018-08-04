<?php

namespace App\Http\Controllers\Vendor;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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
        return view('welcome');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHomeData()
    {
        $products = DB::table('products')->get();

        return view('vendors.products.list', compact('products'));
    }

    public function showLoginForm()
    {
        return view('auth/vendorLogin');
    }

    public function destroy($id)
    {
        dd("jnsdjksnf");
//        $products = products::whereId($id)->firstOrFail();
//        $products->delete();
//        return redirect('/vendorlist');
    }

}
