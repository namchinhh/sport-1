<?php
/**
 * Created by PhpStorm.
 * User: namnt
 * Date: 8/9/18
 * Time: 11:12 AM
 */

namespace App\Http\Controllers\Vendor;

use App\Option;
use App\Place;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Booking;

class BookingController
{

    public function listBooking()
    {
        $vendorId = Auth::user()->id;

        $bookings = Booking::whereVendorId($vendorId)->get();

        $data = [];
        foreach ($bookings as $booking) {

            $user = User::findOrFail($booking->user_id);
            $product = Product::findOrFail($booking->product_id);
            $place = Place::findOrFail($product->place_id);
            $option = Option::findOrFail($booking->option_id);
            if ($booking->status == 1) {
                $status = 'Đang chờ duyệt';
            } elseif ($booking->status == 2) {
                $status = "Đã chấp nhận";
            } else {
                $status = "Đã từ chối";
            }
            $bookData = [
                'id' => $booking->id,
                'userName' => $user->name,
                'product' => $place->name . " - " . $product->id,
                'option' => $option->title . " - " . $option->price,
                'date' => $booking->date,
                'status' => $status,
                'created_at' => $booking->created_at
            ];
            $data[] = $bookData;
        }

        return view('vendors.booking.list-booking', compact('data'));
    }

    public function acceptBooking($id)
    {
        Booking::findOrFail($id)->update(['status' => 2]);

        return redirect()->back()->with('status', __('Update thành công'));
    }

    public function rejectBooking($id)
    {
        Booking::findOrFail($id)->update(['status' => 3]);

        return redirect()->back()->with('status', __('Update thành công'));
    }
}