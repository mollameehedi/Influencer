<?php

use Illuminate\Support\Facades\Auth;

function user()
{
    return Auth::user();
}
function single_user($id)
{
    return App\User::find($id)->name;
}

function complete_order()
{
    return App\Order::where('offer_activity', 3)->get()->count();
}
function active_order()
{
    return App\Order::where('offer_activity', 2)->get()->count();
}
function new_order()
{
    return App\Order::where('offer_activity', 1)->get()->count();
}

function auth_new_order()
{
    return App\Order::where('user_id', Auth::id())->where('offer_activity', 1)->get()->count();
}
function auth_active_order()
{
    return App\Order::where('user_id', Auth::id())->where('offer_activity', 2)->get()->count();
}
function auth_complete_order()
{
    return App\Order::where('user_id', Auth::id())->where('offer_activity', 3)->get()->count();
}
