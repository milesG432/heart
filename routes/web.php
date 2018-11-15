<?php

/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register web routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "web" middleware group. Now create something great!
  |
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/pulseoffice', function() {
    return view('pulseoffice');
});

Route::get('/pulsestore', function() {
    return view('pulsestore');
});

Route::get('/support', function() {
    return view('support');
});

Route::get('/news', function() {
    return view('news');
});

Route::post('/authenticate', 'userController@logIn');

Route::get('/logout', 'userController@logOut');

Route::get('/admin', 'userController@getAdmins');

Route::post('/createAdmin', 'userController@newAdmin');

route::get('/deleteAdmin', 'userController@deleteAdmin');

route::get('/editAdmin', 'userController@editAdmin');

route::post('/editAdminDetails', 'userController@insertEdittedAdmin');

route::get('/issues', 'issueController@getIssues');

Route::post('/createIssue', 'issueController@insertIssue');

Route::get('/editIssue', 'issueController@getIssues');

Route::post('/insertEdittedIssue', 'issueController@insertEdittedIssue');

Route::get('/wishlist', 'wishlistController@getWishlistItems');

Route::post('/createWishlist', 'wishlistController@addItem');

Route::get('/upvote', 'wishlistController@upvote');

Route::get('/editWish', 'wishlistController@getWishlistItems');

Route::post('/insertEdittedWish', 'wishListController@insertEdittedWish');
