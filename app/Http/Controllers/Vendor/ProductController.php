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

    public function newAction()
    {
        return view('vendors.products.edit');
    }

    public function editProduct($id)
    {
        $product = Product::whereId($id)->firstOrFail();
        return view('vendors.products.edit',compact('product'));
    }

    public function store(ProductFormRequest $request)
    {
        $product = new Product(array(
            'type' => $request->get('type'),
            'description' => $request->get('description'),
            'address' => $request->get('address'),
            'thumbnail' => $request->get('thumbnail'),
            'images' => $request->get('images'),
        ));

        $product->save();

        return redirect('/products')->with('status', __('Tạo thành công!'));
    }
}
