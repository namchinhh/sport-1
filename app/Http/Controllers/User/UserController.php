<?php

namespace App\Http\Controllers\User;

use App\Option;
use App\Product;
use App\Place;
use App\Post;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

    public function getProducts($type)
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
        $products = Product::where('type', $type)->get();
        foreach ($places as $place) {
            $placeArr['place_id'] = $place->id;
            $placeArr['name'] = $place->name;
            $placeArr['address'] = $place->address;
            $placeArr['image'] = Product::where('place_id', $place->id)->firstOrFail()->images;
            $placeArr['content'] = Product::where('place_id', $place->id)->firstOrFail()->description;
            $productOptionData = [];
            $option = [];
            foreach ($products as $product) {
                if ($product->place_id == $place->id) {
                    $productOption[] = Option::where('product_id', $product->id)->get();
                }
            }
            for ($dem = 0; $dem < sizeof($productOption); $dem++) {
                if (sizeof($productOption[$dem]) > 0) {
                    $title = $productOption[$dem][0]->title;
                }
                $min = substr($title, 0, 5);
                $max = substr($title, 8, 5);
                $productOptionData[] = $min;
                $productOptionData[] = $max;
            }
        }

        sort($productOptionData);
        dd($productOptionData);
        $option [] = $productOptionData[0];
        $option [] = $productOptionData[sizeof($productOptionData) - 1];
        $placeArr['option'] = $option;
        $data [] = $placeArr;

        dd($data);


        return view('users.products', compact('data'), compact('namePage'));

    }
}
