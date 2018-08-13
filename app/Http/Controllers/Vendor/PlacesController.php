<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Requests\Vendor\PlaceFormRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Place;

class PlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $places = Place::whereVendorId(Auth::user()->id)->get();
        return view('vendors.places.getPlaces', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('vendors.places.createPlace');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlaceFormRequest $request)
    {
        //
        $vendorId = Auth::user()->id;
        try {
            Place::create([
                'vendor_id' => $vendorId,
                'name' => $request->get('name'),
                'address' => $request->get('address'),
            ]);
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', __('Has An Error!'));
        }
        return redirect('vendor/places')->with('status', __('A Post has been created'));
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
        $place = Place::whereId($id)->findOrFail();
        //
        return view('vendors.places.createPlace', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlaceFormRequest $request, $id)
    {
        if ($request->get('address') == null) {
            return redirect()->back()->with('error', __('Địa Chỉ Không thể Để Trống'));
        } else {
            try {
                $place = Place::whereId($id)->findOrFail();
                $place->address = $request->get('address');
                $place->name = $request->get('name');
                $place->save();
            } catch (\Exception $exception) {
                return redirect()->back()->with('error', __('Has error while update'));
            }
        }
        return redirect('vendor/places')->with('status', __('Place had been Updated '));
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
        $place = Place::whereId($id)->findOrFail();
        $place->delete();
        return redirect('vendor/places')->with('status', 'The Place ' . $id . ' has been deleted');
    }
}
