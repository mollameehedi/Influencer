<?php

namespace App\Http\Controllers;

use App\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userrole');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.offer.index', [
            'offers' => Offer::latest()->get(),
        ]);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = Offer::insertGetId($request->except('_token', 'bg') + [
            'created_at' => Carbon::now(),
        ]);
        $uploaded_photo = $request->file('bg');
        $new_file_name = $id . "." . $uploaded_photo->getClientOriginalExtension();
        $new_file_location = 'public/uploads/offer_bg/' . $new_file_name;
        Image::make($uploaded_photo)->save(base_path($new_file_location));
        Offer::find($id)->update([
            'bg' => $new_file_name,
        ]);
        return back()->with('add_offer', 'Offer added successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        return view('admin.offer.show', [
            'info' => Offer::find($offer->id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        Offer::find($offer->id)->update($request->except('_token', 'bg'));
        if ($request->hasFile('bg')) {
            if (Offer::find($offer->id)->bg != 'default.jpg') {
                $old_photo_location = 'public/uploads/offer_bg/' . Offer::find($offer->id)->bg;
                unlink(base_path($old_photo_location));
            }
            $uploaded_photo = $request->file('bg');
            $new_file_name = $offer->id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_file_location = 'public/uploads/offer_bg/' . $new_file_name;
            Image::make($uploaded_photo)->save(base_path($new_file_location));
            Offer::find($offer->id)->update([
                'bg' => $new_file_name,
            ]);
        }
        return back()->with('update_offer', 'Offer updated successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer)
    {
        if (Offer::find($offer->id)->bg != 'default.jpg') {
            $old_photo_location = 'public/uploads/offer_bg/' . Offer::find($offer->id)->bg;
            unlink(base_path($old_photo_location));
        }
        Offer::find($offer->id)->delete();
        return back()->with('delete_offer', 'Offer deleted successfully!!');
    }
}
