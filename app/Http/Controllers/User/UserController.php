<?php

namespace App\Http\Controllers\User;

use App\Option;
use App\Product;
use App\Place;
use App\Post;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    //
    public function home()
    {
        return view('index');
    }

    public function getLogin()
    {
        return view('auth\login');
    }

    public function getPostDetail($id)
    {
        $post = Post::whereId($id)->findOrFail();
        return view('postDetail', compact('post'));
    }

    public function getPlaces($type)
    {
        if ($type == 'football') {
            $namePage = __('Sân Bóng');
            $type = 1;
        } else {
            if ($type == 'swimming-pool') {
                $namePage = __('Bể Bơi');
                $type = 2;
            } else {
                $namePage = __('Sân Tennis');
                $type = 3;
            }
        }
        $places = Place::all();
        $data = [];


        foreach ($places as $place) {

            //getPosts for right-box

            $placeArr['place_id'] = $place->id;
            $placeArr['name'] = $place->name;
            $placeArr['address'] = $place->address;
            try {
                $placeArr['image'] = Product::where('place_id', $place->id)->firstOrFail()->images;
                $placeArr['content'] = Product::where('place_id', $place->id)->firstOrFail()->description;
            } catch (\Exception $e) {
            }
            $minTimeProduct = "";
            $maxTimeProduct = "";
            $user = User::where('id', $place->vendor_id)->firstOrFail();
            $vendor_name = $user->name;
            $placeArr['vendor_name'] = $vendor_name;
            $products = Product::where('type', $type)->Where('place_id', $place->id)->get();
            $productOption = [];
            if (count($products) > 0) {
                foreach ($products as $product) {
                    if ($product->place_id == $place->id) {
                        $productOption[] = Option::where('product_id', $product->id)->get();
                    }
                }
                $options = [];

                foreach ($productOption as $option) {
                    $min = substr($option[0]->title, 0, 5);
                    $max = substr($option[0]->title, 8, 5);

                    if ($minTimeProduct == "" || $minTimeProduct > $min) {
                        $minTimeProduct = $min;
                    }
                    if ($maxTimeProduct == "" || $maxTimeProduct < $max) {
                        $maxTimeProduct = $max;
                    }
                    $options[] = $minTimeProduct;
                    $options[] = $maxTimeProduct;

                }
                sort($options);
                $data['option'][$place->id] = $options[0] . ' - ' . $options[count($options) - 1];

                $prices = [];
                foreach ($productOption as $option) {
                    $price = $option[0]->price;
                    $prices[] = $price;
                }
                sort($prices);
                if ($prices[0] != $prices[count($prices) - 1]) {
                    $data['price'][$place->id] = 'Form: ' . $prices[0] . ' To: ' . $prices[count($prices) - 1];
                } else {
                    $data['price'][$place->id] = $priceToShow = $prices[0];

                }
            }
            $data [] = $placeArr;
        }
        $posts = DB::table('posts')->get()->forPage(1, 4);
        $data [] = $posts;
        return view('users.places', compact('data'), compact('namePage'));
    }

    public function getProducts($idPlace)
    {
        $placeName = Place::where('id', $idPlace)->firstOrFail()->name;
        $products = Product::where('place_id', $idPlace)->get();
        $optionsOfProduct = [];
        foreach ($products as $product) {
            $options = Option::where('product_id', $product->id)->get();
            $optionsOfProduct[$product->id] = $options;
        }
        return view('users.products', compact('products'), compact('optionsOfProduct'))->with('placeName', $placeName);
    }
}
