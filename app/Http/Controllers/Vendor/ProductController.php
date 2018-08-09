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
use App\Place;
use Illuminate\Support\Facades\Auth;
use App\Product;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{

    public function newProduct()
    {
        $vendorId = Auth::user()->id;
        $placesCollection = Place::whereVendorId($vendorId)->get();
        $places=[];
        foreach ($placesCollection as $placeModel) {
            $places[$placeModel->id] = $placeModel->name;
        }
        $types = [
            '1' => trans('Sân Bóng'),
            '2' => trans('Sân Tennis'),
            '3' => trans('Bể Bơi')
        ];

        return view('vendors.products.edit', compact(['vendorId', 'places', 'types']));
    }

    public function editProduct($id)
    {
        $vendorId = Auth::user()->id;
        $product = Product::findOrFail($id);
        $options = Option::whereProductId($id)->get();
        $placesCollection = Place::whereVendorId($vendorId)->get();
        $images = $product->images;
        $types = [
            '1' => trans('Sân Bóng'),
            '2' => trans('Sân Tennis'),
            '3' => trans('Bể Bơi')
        ];
        $places = [];
        foreach ($placesCollection as $placeModel) {
            $places[$placeModel->id] = $placeModel->name;
        }

        return view('vendors.products.edit', compact(['product', 'vendorId', 'options', 'images', 'places', 'types']));
    }

    public function store(ProductFormRequest $request)
    {
        try {
            $options = $request->options;
            if (!$options) {
                return redirect()->back()->with('error', __('Thiếu lựa chọn cho sân.'));
            }

            $productId = $request->productId;
            if ($productId) {
                $product = Product::whereId($productId);
            }
            $productData = [
                'vendor_id' => $request->vendorId,
                'type' => $request->type,
                'description' => $request->description,
                'status' => $request->status,
                'place_id'=>$request->placeId
            ];
            if ($request->thumbnail) {
                $photoName = time() . '.' . $request->thumbnail->getClientOriginalExtension();
                $request->thumbnail->move(public_path('product_photo/thumbnail'), $photoName);
                $productData['thumbnail'] = $photoName;
                if ($productId) {
                    $image_path = "/product_photo/thumbnail/" . $product->thumbnail;
                    if (File::exists($image_path)) {
                        File::delete($image_path);
                    }
                }
            }
            if (!@$productData['images']) {
                $productData['images'] = '';
            }
            if ($productId) {
                $product->update($productData);
                $successMessage = __('Lưu thành công!');
            } else {
                $productId = Product::create($productData)->id;
                $successMessage = __('Tạo thành công!');
            }
            for ($i = 0; $i < count($options['title']); $i++) {
                $optionsData = [
                    'product_id' => $productId,
                    'title' => $options['title'][$i],
                    'price' => $options['price'][$i],
                    'description' => $options['description'][$i]
                ];
                if (@$options['id'][$i]) {
                    Option::whereId($options['id'][$i])->update($optionsData);
                } else {
                    Option::create($optionsData);
                }
            }
        } catch (\Exception $exception) {
            $error = $exception->getMessage() . "\n File: " . $exception->getFile() . "\n Line: " . $exception->getLine();

            return redirect()->back()->with('error', $error);
        }

        return Redirect::route('editProduct', $productId)->with('success', $successMessage);
    }
}
