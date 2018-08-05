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
        return view('index');
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

    public function deleteProduct($id){
        $products = Products::find($id);

        $products->delete();

        return redirect('/vendorlist')->with('msg',"da xoa san bong thanh cong");
    }

//    public function destroy($id)
//    {
//        dd("jnsdjksnf");
////        $products = products::whereId($id)->firstOrFail();
////        $products->delete();
////        return redirect('/vendorlist');
//    }

}
