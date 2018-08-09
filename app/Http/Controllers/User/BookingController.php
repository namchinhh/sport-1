<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Option;
use App\Product;
use App\Booking;
use App\Post;
use App\Http\Controllers\Controller;
use App\User;
use DateTime;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($optionId)
    {

        $option = Option::findOrFail($optionId);
        $product = Product::findOrFail($option->product_id);
        $price = $option->price;
        $status = "pending";
        $date = new DateTime('today');
        $optionchoosen = $option->title;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
        } else {
            return redirect()->back()->with('error', __('Use Need Login!'));
        }
        $product_id = $product->id;
        try {
            Booking::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
                'option_id' => $optionId,
                'total_price' => $price,
                'date' => $date,
                'option_chosen' => $optionchoosen,
                'status' => 1,
            ]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
        return redirect()->back()->with('status', 'Booking' . $optionId . 'has been done');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
