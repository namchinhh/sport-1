<?php

namespace App\Http\Controllers\User;

use App\Booking;
use App\Option;
use App\Product;
use App\Place;
use App\Post;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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

    public function getBooked()
    {
        $userId = Auth::user()->id;
        $bookings = Booking::whereUserId($userId)->get();
        $data = [];
        $dem = 0;
        foreach ($bookings as $booking) {
            $products = Product::findOrFail($booking->product_id);
            $vendorName = User::findOrFail($products->vendor_id)->name;
            $placeName = Place::findOrFail($products->place_id)->name;
            $data [$dem]['vendorName'] = $vendorName;
            $data [$dem]['placeName'] = $placeName;
            $data [$dem]['productId'] = $products->id;
            $data[$dem]['option'] = $booking->option_chosen;
            $data[$dem]['price'] = $booking->total_price;
            $data[$dem]['date'] = $booking->date;

            switch ($booking->status) {
                case 1:
                    $status = "Đang Chờ";
                    break;
                case 2:
                    $status = "Đã Chấp Nhận";
                    break;
                case 3:
                    $status = "Đã Hủy Bỏ ";
                    break;
                default:
                    $status = "Đang Chờ  ";
                    break;

            }
            $data[$dem]['status'] = $status;
            $dem++;
        }
        return view('users.booked', compact(['data']));
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

        return view('users.products', compact('products'))->with('placeName', $placeName)->with('placeId', $idPlace);
    }

    public function getOption($idPlace, $month, $day, $year)
    {

        $products = Product::where('place_id', $idPlace)->get();
        $optionsOfProduct = [];
        foreach ($products as $product) {
            $options = Option::where('product_id', $product->id)->get();
            foreach ($options as $option) {
                $optionsOfProduct[] = $option;
            }
        }
        $titlePrice = [];
        for ($i = 0; $i < count($optionsOfProduct); $i++) {
            $titlePrice[$i]['title'] = $optionsOfProduct[$i]->title;
            $titlePrice[$i]['price'] = $optionsOfProduct[$i]->price;
            $titlePrice[$i]['id'] = $optionsOfProduct[$i]->id;
        }
        for ($i = 0; $i < count($titlePrice); $i++) {
            $title = $titlePrice[$i]['title'];
            $endHour = substr($title, 8, 5);
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $dateT = date("h:i A");
            $price = $titlePrice[$i]['price'];
            $id = $titlePrice[$i]['id'];
            $this->formartDate($dateT, $title, $price, $id);

        }
    }

    public function formartDate($date, $title, $price, $id)
    {
        $amOrPm = substr($date, 6, 2);
        $h = substr($date, 0, 2);
        $m = substr($date, 3, 2);
        if ($amOrPm == "AM") {
            if ($h == 12) {
                $h = "00";
            }
        }
        $now = $h . ':' . $m;
        if ($now < $title) {
            echo "<button class='btn-default' type = 'button' onclick ='myFunction($id);'> $title / Giá: $price </button>";
            echo '<br/>';
            echo '<br/>';
        } else {
            echo "<button disabled class='btn btn-default ' type = 'button' onclick ='myFunction($id);'> $title / Giá: $price </button>";
            echo '<br/>';
            echo '<br/>';
        }
    }

}
