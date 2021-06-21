<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('userrole');
    }
    public function homeorders()
    {
        return view('admin.order.index', [
            'orders' => Order::latest()->paginate(12),
        ]);
    }

    public function homeordersdelete($id)
    {
        Order::find($id)->delete();
        return back()->with('delete_status', 'Order Deleted successfully!!!');
    }
    public function homeordersaccept($id)
    {
        Order::find($id)->update([
            'offer_activity' => 2
        ]);
        return back()->with('accept_status', 'Order Accept successfully!!!');
    }
    public function homeordercomplete($id)
    {
        Order::find($id)->update([
            'offer_activity' => 3
        ]);
        return back()->with('complete_status', 'Order Accept successfully!!!');
    }
}
