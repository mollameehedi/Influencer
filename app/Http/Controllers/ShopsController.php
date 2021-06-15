<?php

namespace App\Http\Controllers;

use App\Shops_detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.shop.index', [
            'shops' => Shops_detail::latest()->get(),
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
        $id = Shops_detail::insertGetId($request->except('_token', 'thumbnail') + [
            'created_at' => Carbon::now(),
        ]);
        $uploaded_photo = $request->file('thumbnail');
        $new_file_name = $id . "." . $uploaded_photo->getClientOriginalExtension();
        $new_file_location = 'public/uploads/shop_photo/' . $new_file_name;
        Image::make($uploaded_photo)->save(base_path($new_file_location));
        Shops_detail::find($id)->update([
            'thumbnail' => $new_file_name,
        ]);
        return back()->with('add_shop', 'Shop added successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Shops_detail $shop)
    {
        return view('admin.shop.show', [
            'info' => Shops_detail::find($shop->id)
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
    public function update(Request $request, Shops_detail $shop)
    {
        Shops_detail::find($shop->id)->update($request->except('_token', 'thumbnail'));
        if ($request->hasFile('thumbnail')) {
            if (Shops_detail::find($shop->id)->thumbnail != 'default.jpg') {
                $old_photo_location = 'public/uploads/shop_photo/' . Shops_detail::find($shop->id)->thumbnail;
                unlink(base_path($old_photo_location));
            }
            $uploaded_photo = $request->file('thumbnail');
            $new_file_name = $shop->id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_file_location = 'public/uploads/shop_photo/' . $new_file_name;
            Image::make($uploaded_photo)->save(base_path($new_file_location));
            Shops_detail::find($shop->id)->update([
                'thumbnail' => $new_file_name,
            ]);
        }
        return back()->with('update_shop', 'Shop updated successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shops_detail $shop)
    {
        if (Shops_detail::find($shop->id)->thumbnail != 'default.jpg') {
            $old_photo_location = 'public/uploads/shop_photo/' . Shops_detail::find($shop->id)->thumbnail;
            unlink(base_path($old_photo_location));
        }
        Shops_detail::find($shop->id)->delete();
        return back()->with('delete_shop', 'Shop deleted successfully!!');
        
    }
}
