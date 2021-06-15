<?php

namespace App\Http\Controllers;

use Image;
use App\Logo;
use App\User;
use App\Offer;
use App\Social;
use App\Benifit;
use App\Partner;
use Carbon\Carbon;
use App\Shops_detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index', [
            'logo' => Logo::find(1),
            'partners' => Partner::latest()->get(),
            'benifits1' => Benifit::find(1),
            'benifits2' => Benifit::find(2),
            'benifits3' => Benifit::find(3),
            'offers' => Offer::latest()->get(),
            'socials' => Social::latest()->get(),
        ]);
    }
    public function merchant()
    {
        return view('frontend.merchant');
    }
    public function verification(Request $request)
    {
        $user_info = User::where('name', $request->name)->first();


        if ($user_info->email_verified_at === null) {
            return back()->withErrors('Your account no verified!!');
        } else {
            if ($user_info) {
                if ($user_info->whatsapp_number === $request->number) {
                    if ($user_info->email === $request->email) {
                        if ($user_info->instagram === $request->instagram) {
                            return view('frontend.verification', [
                                'user_id' => $user_info->id
                            ]);
                        } else {
                            return back()->withErrors('Instagram username dutch Not match!!');
                        }
                    } else {
                        return back()->withErrors('Email dutch Not match!!');
                    }
                } else {
                    return back()->withErrors("Number dutch Not match!!");
                }
            } else {
                return back()->withErrors("Name aren't there");
            }
        }
    }
    public function verificationlogin(Request $request)
    {
        $user_info = User::find($request->user_id)->first();
        echo $user_email = $user_info->email;
        echo $user_password = $user_info->password;

        if ($user_info->whatsapp_number == $request->number) {
            Auth::attempt(['email' => $user_email, 'password' => 'Infouencer123']);
            redirect('home');
        } else {
            return back()->withErrors('Instagram username dutch Not match!!');
        }


        // if ($user_info->whatsapp_number) {
        //     // if ($user_info->instagram === $request->instagram) {
        // return view('frontend.verification', [
        //     echo 'done';
        // ]);
        //     //     echo 'done';
        //     // } else {
        //     //     return back()->withErrors('Instagram username dutch Not match!!');
        //     // }
        // } else {
        // }
    }
    public function category()
    {
        return view('frontend.category');
    }
    public function deliveryoffers()
    {
        return view('frontend.experienceoffers', [
            'shops' => Shops_detail::where('type', 1)->latest()->get()
        ]);
    }
    public function experienceoffers()
    {
        return view('frontend.experienceoffers', [
            'shops' => Shops_detail::where('type', 2)->latest()->get()
        ]);
        // return view('frontend.experienceoffers');
    }
    public function dinneroffers()
    {
        return view('frontend.experienceoffers', [
            'shops' => Shops_detail::where('type', 3)->latest()->get()
        ]);
        // return view('frontend.dinneroffers');
    }
    public function offerdetail()
    {
        return view('frontend.shop_detail');
    }




    public function becomeaninfluencerstore(Request $request)
    {
        $password = 'Infouencer123';
        $id = User::insertGetId($request->except("_token", "password", "My_instagram", "follower_ins") + [
            'password' => Hash::make($password),
            'created_at' => Carbon::now(),
            'rules' => 2
        ]);

        if ($request->hasFile('profile_photo')) {

            $uploaded_photo = $request->file('profile_photo');
            $new_file_name = $id . "." . $uploaded_photo->getClientOriginalExtension();
            $new_file_location = 'public/uploads/profile_photos/' . $new_file_name;
            Image::make($uploaded_photo)->resize(300, 300)->save(base_path($new_file_location));
            User::find($id)->update([
                'profile_photo' => $new_file_name,
            ]);


            // $uploaded_photo = $request->file('profile_photo');
            // $new_file_name = $id . "." . $uploaded_photo->getClientOriginalExtension();
            // $new_file_location = 'public/uploads/logo/' . $new_file_name;
            // Image::make($uploaded_photo)->save(base_path($new_file_location));
            // Logo::find($id)->update([
            //     'profile_photo' => $new_file_name,
            // ]);
        }
        return back()->with('uer_request', 'Request sent Successfully!!!');
    }
}
