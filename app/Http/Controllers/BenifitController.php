<?php

namespace App\Http\Controllers;

use App\Benifit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class BenifitController extends Controller
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
        return view('admin.benifit.index', [
            'benifits' => Benifit::latest()->get(),
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
        $id =  Benifit::insertGetId($request->except('_token', 'icon') + [
            'created_at' => Carbon::now(),
        ]);
        $uploaded_photo = $request->file('icon');
        $new_file_name = $id . "." . $uploaded_photo->getClientOriginalExtension();
        $new_file_location = 'public/uploads/benifit_icon/' . $new_file_name;
        Image::make($uploaded_photo)->save(base_path($new_file_location));
        Benifit::find($id)->update([
            'icon' => $new_file_name,
        ]);
        return back()->with('add_benifit', 'Benifit added successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Benifit $benifit)
    {
        return view('admin.benifit.show', [
            'info' => Benifit::find($benifit->id)
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
    public function update(Request $request, Benifit $benifit)
    {
        Benifit::find($benifit->id)->update($request->except('_token', 'icon'));
        if ($request->hasFile('icon')) {
            if (Benifit::find($benifit->id)->icon != 'default.png') {
                $old_photo_location = 'public/uploads/benifit_icon/' . Benifit::find($benifit->id)->icon;
                unlink(base_path($old_photo_location));
            }
            $uploaded_photo = $request->file('icon');
            $new_file_name = $benifit->id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_file_location = 'public/uploads/benifit_icon/' . $new_file_name;
            Image::make($uploaded_photo)->save(base_path($new_file_location));
            Benifit_heading::find($benifit->id)->update([
                'icon' => $new_file_name,
            ]);
        }
        return back()->with('update_benifit', 'Benifit updated successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Benifit $benifit)
    {
        if (Benifit::find($benifit->id)->icon != 'default.png') {
            $old_photo_location = 'public/uploads/benifit_icon/' . Benifit::find($benifit->id)->icon;
            unlink(base_path($old_photo_location));
        }
        Benifit::find($benifit->id)->delete();
        return back()->with('delete_benifit', 'Benifit deleted successfully!!');
    }
}
