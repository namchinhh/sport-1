<?php

namespace App\Http\Controllers\Vendor;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UploadController extends Controller
{
    function postImages(Request $request)
    {
        $productId = $request->productId;
        if ($request->ajax()) {
            if ($request->hasFile('file')) {
                // set destination path
                $folderDir = 'product_photo/slider';
                $destinationPath = public_path() . '/' . $folderDir;
                // this form uploads multiple files
                foreach ($request->file('file') as $fileKey => $fileObject) {
                    // make sure each file is valid
                    if ($fileObject->isValid()) {
                        // make destination file name
                        $destinationFileName = time() . '.' . $fileObject->getClientOriginalExtension();
                        $size = $fileObject->getClientSize();                        // move the file from tmp to the destination path
                        $fileObject->move($destinationPath, $destinationFileName);
                        $product = Product::findOrFail($productId);
                        $images = $product->images;
                        $images = json_decode($images, true);
                        $images[$destinationFileName] = $size;
                        $product->images = json_encode($images);
                        $product->save();

                        return $product->images;
                    }
                }
            }
        }

        return null;
    }

    function removeImages(Request $request)
    {
        if ($request->ajax()) {
            // set destination path
            try {
                $productId = $request->productId;
                $id = $request->id;
                $product = Product::findOrFail($productId);
                $images = $product->images;
                $images = json_decode($images, true);
                if (array_key_exists($id, $images)) {
                    unset($images[$id]);
                    if (count($images) > 0) {
                        $product->images = json_encode($images);
                    } else {
                        $product->images = null;
                    }
                    $product->save();

                    return $product->images;
                }
            } catch (\Exception $exception) {

                return $exception->getMessage();
            }
        }

        return null;
    }
}
