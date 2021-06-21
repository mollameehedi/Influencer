<?php

namespace App\Http\Controllers;

use App\Partner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ClientlogoController extends Controller
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
        return view('admin.partner.index', [
            'partners' => Partner::latest()->get(),
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
        $id = Partner::insertGetId($request->except('_token', 'partner_logo') + [
            'created_at' => Carbon::now(),
        ]);
        $uploaded_photo = $request->file('partner_logo');
        $new_file_name = $id . "." . $uploaded_photo->getClientOriginalExtension();
        $new_file_location = 'public/uploads/partner_logo/' . $new_file_name;
        Image::make($uploaded_photo)->save(base_path($new_file_location));
        Partner::find($id)->update([
            'partner_logo' => $new_file_name,
        ]);
        return back()->with('add_partner', 'Partner logo added successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $logo)
    {
        return view('admin.partner.show', [
            'info' => Partner::find($logo->id)
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
    public function update(Request $request, Partner $logo)
    {
        if ($request->hasFile('partner_logo')) {
            if (Partner::find($logo->id)->partner_logo != 'default.png') {
                $old_photo_location = 'public/uploads/partner_logo/' . Partner::find($logo->id)->partner_logo;
                unlink(base_path($old_photo_location));
            }
            $uploaded_photo = $request->file('partner_logo');
            $new_file_name = $logo->id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_file_location = 'public/uploads/partner_logo/' . $new_file_name;
            Image::make($uploaded_photo)->save(base_path($new_file_location));
            Partner::find($logo->id)->update([
                'partner_logo' => $new_file_name,
            ]);
        }
        return back()->with('update_partner', 'Partner updated Successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $logo)
    {
        if (Partner::find($logo->id)->partner_logo != 'default.png') {
            $old_photo_location = 'public/uploads/partner_logo/' . Partner::find($logo->id)->partner_logo;
            unlink(base_path($old_photo_location));
        }
        Partner::find($logo->id)->delete();
        return back()->with('delete_logo', 'Partner logo deleted successfully!!');
    }
}
