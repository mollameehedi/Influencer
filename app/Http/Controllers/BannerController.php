<?php

namespace App\Http\Controllers;

use App\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
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
        return view('admin.banner.index', [
            'banners' => Banner::latest()->get(),
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
        $request->validate([
            'bg' => 'required'
        ]);
        $id = Banner::insertGetId($request->except('_token') + [
            'created_at' => Carbon::now(),
        ]);
        $uploaded_photo = $request->file('bg');
        $new_file_name = $id . "." . $uploaded_photo->getClientOriginalExtension();
        $new_file_location = 'public/uploads/banner_bg/' . $new_file_name;
        Image::make($uploaded_photo)->save(base_path($new_file_location));
        Banner::find($id)->update([
            'bg' => $new_file_name,
        ]);
        return back()->with('add_banner', 'Banner added successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('admin.banner.show', [
            'info' => Banner::find($banner->id),
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
    public function update(Request $request, Banner $banner)
    {
        Banner::find($banner->id)->update($request->except('_token', 'bg'));
        if ($request->hasFile('bg')) {
            if (Banner::find($banner->id)->bg != 'default.jpg') {
                $old_photo_location = 'public/uploads/banner_bg/' . Banner::find($banner->id)->bg;
                unlink(base_path($old_photo_location));
            }
            $uploaded_photo = $request->file('bg');
            $new_file_name = $banner->id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_file_location = 'public/uploads/banner_bg/' . $new_file_name;
            Image::make($uploaded_photo)->save(base_path($new_file_location));
            Banner::find($banner->id)->update([
                'bg' => $new_file_name,
            ]);
        }
        return back()->with('update_banner', 'Banner updated Successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        if (Banner::find($banner->id)->bg != 'default.jpg') {
            $old_photo_location = 'public/uploads/banner_bg/' . Banner::find($banner->id)->bg;
            unlink(base_path($old_photo_location));
        }
        Banner::find($banner->id)->delete();
        return back()->with('delete_banner', 'Banner deleted successfully !');
    }
}
