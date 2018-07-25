<?php
/**
 * Created by PhpStorm.
 * User: namnt
 * Date: 7/27/18
 * Time: 9:05 AM
 */

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Product;

class ProductController extends Controller
{

    public function newProduct()
    {
        return view('vendors.products.edit');
    }

    public function editProduct($id)
    {
        $product = Product::whereId($id)->findOrFail();

        return view('vendors.products.edit', compact('product'));
    }

    public function store(ProductFormRequest $request)
    {
        Product::create($request->all());

        return redirect('/products')->with('status', __('Tạo thành công!'));
    }
}
