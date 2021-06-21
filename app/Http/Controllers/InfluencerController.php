<?php

namespace App\Http\Controllers;

use App\Order;
use App\Shops_detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class InfluencerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function dashboardinfluencer()
    {

        return view('influencer.dashboard', [
            'orders' => Order::where('user_id', auth::id())->latest()->paginate(12),
        ]);
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
    public function offerdetail($id)
    {
        return view('frontend.shop_detail', [
            'offer_details' => Shops_detail::find($id)
        ]);
    }

    public function offerrequest($id)
    {
        Order::insert([
            'user_id' => Auth::id(),
            'offer_id' => $id,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('request_status', 'Offer request sent successfully!!');
    }
}
