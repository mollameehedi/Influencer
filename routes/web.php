<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', 'FrontendController@index')->name('index');
Route::get('merchant', 'FrontendController@merchant')->name('merchant');
Route::post('verification', 'FrontendController@verification')->name('verification');
// Route::post('verified/login', 'FrontendController@verifiedlogin')->name('verified.singin');
Route::post('varification/login', 'FrontendController@verificationlogin')->name('verified.login');

Route::post('become/an/influencer/store', 'FrontendController@becomeaninfluencerstore')->name('become.an.influencer.store');

Auth::routes(['verify' => true]);

Route::get('home', 'HomeController@index')->name('home');
Route::get('edit/profile', 'HomeController@editprofile')->name('editprofile');
Route::post('change/name', 'HomeController@changename')->name('changename');
Route::post('change/photo', 'HomeController@changephoto')->name('changephoto');
Route::post('change/password', 'HomeController@changepassword')->name('changepassword');
Route::get('home/logo', 'HomeController@logo')->name('logo');
Route::post('home/logo/update/post/{id}', 'HomeController@updatelogo')->name('updatelogo');



//BannerController
Route::resource('home/banner', 'BannerController');





//PartnerController
Route::resource('home/client/logo', 'ClientlogoController');





//BenifitController
Route::resource('home/benifit', 'BenifitController');



//SocialController
Route::resource('home/social', 'SocialController');



//OfferController
Route::resource('home/offer', 'OfferController');



//ShopsController
Route::resource('home/shops', 'ShopsController');


//user controller route start here
Route::get('home/user/delete/{id}', 'UserController@delete')->name('user.delete');
Route::get('home/user/verified/{id}', 'UserController@verified')->name('user.verified');
Route::get('home/user/show/{id}', 'UserController@show')->name('user.show');


//Influencer controller route start
Route::get('dashboard/incluencer', 'InfluencerController@dashboardinfluencer')->name('dashboard.influencer');
Route::get('category', 'InfluencerController@category')->name('category');
Route::get('delivery-offers', 'InfluencerController@deliveryoffers')->name('deliveryoffers');
Route::get('experience-offers', 'InfluencerController@experienceoffers')->name('experienceoffers');
Route::get('dinner-offers', 'InfluencerController@dinneroffers')->name('dinneroffers');
Route::get('offer-details/{id}', 'InfluencerController@offerdetail')->name('offerdetail');
Route::get('offer/request/{id}', 'InfluencerController@offerrequest')->name('offer.request');

// order controller route start
Route::get('home/orders', 'OrderController@homeorders')->name('home.order.index');
Route::get('home/orders/accept/{id}', 'OrderController@homeordersaccept')->name('home.order.accept');
Route::get('home/order/complete{id}', 'OrderController@homeordercomplete')->name('home.order.complete');
Route::get('home/orders/delete/{id}', 'OrderController@homeordersdelete')->name('home.order.delete');
