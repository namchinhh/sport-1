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
use App\Option;
use App\Product;

class ProductController extends Controller
{

    public function newProduct()
    {
        //testing with vendor 1
        $vendorId = 1;

        return view('vendors.products.edit', compact('vendorId'));
    }

    public function editProduct($id)
    {
        //testing with vendor 1
        $vendorId = 1;
        $product = Product::whereId($id)->findOrFail();

        return view('vendors.products.edit', compact(['product', 'vendorId']));
    }

    public function store(ProductFormRequest $request)
    {
        try {
            $productData = [
                'vendor_id' => $request->vendorId,
                'type' => $request->type,
                'description' => $request->description,
                'status' => $request->status,
                'address' => $request->address
            ];
            $photoName = time() . '.' . $request->thumbnail->getClientOriginalExtension();
            $request->thumbnail->move(public_path('product_photo/thumbnail'), $photoName);
            $productData['thumbnail'] = $photoName;
            if (!@$productData['images']) {
                $productData['images'] = '';
            }
            Product::create($productData);

        } catch (\Exception $exception) {
            $error = $exception->getMessage() . "\n File: " . $exception->getFile() . "\n Line: " . $exception->getLine();

            return redirect()->back()->with('error', $error);
        }

        return redirect()->back()->with('success', __('Tạo thành công!'));
    }
}
