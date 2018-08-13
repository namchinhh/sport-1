<?php

namespace App\Http\Controllers\Vendor;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getHomeData()
    {
        $products = Product::findOrFail(Auth::user()->id)->get();
        return view('vendors.products.list', compact('products'));
    }

    public function showLoginForm()
    {
        return view('auth/vendorLogin');
    }

    public function deleteProduct($id)
    {
        $products = Product::findOrFail($id);

        $products->delete();

        return redirect()->back()->with('msg', "Đã xóa thành công!");
    }

    public function getSearch(Request $req)
    {
        $products = Product::where('address', 'like', '%' . $req->search . '%')
            ->orwhere('description', 'like', '%' . $req->search . '%')
            ->orwhere('status', 'like', '%' . $req->search . '%')
            ->get();
        return view('vendors.products.search', compact('products'));
    }
}
