<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\registercontroller;

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
Route::get('/',function(){return view("homepage");})->name('home');

Route::get('/logout',"UserController@logout")->name('logout');

Route::get('/facility/request',"RequestController@findex")->name('findex');

Route::post('/reply', "replycontroller@store")->name("addreply");

Route::get('/user/changepassword', "UserController@passpage")->name("cpasswordpage");
Route::post('/user/changepassword', "UserController@pass")->name("password");


Route::get('/request', "RequestController@index")->name("rpage");
Route::get('/request/new', "RequestController@create")->name("rcreatepage");
Route::post('/request', "RequestController@store")->name("rcreate");
Route::post('/request/update/', "RequestController@edit")->name("editstatus");
Route::post('/request/{id}/', "RequestController@destroy")->name("requestdelete");
Route::get('/request/{id}', "RequestController@show");


Route::get('/login', "logincontroller@index")->name("loginpage");
Route::post('/login', "loginController@store")->name("login");


Route::get('/register', "registercontroller@index")->name("registerpage");
Route::post('/register', "registercontroller@store")->name("register");


Route::delete('/user/{id}', "UserController@destroy")->name("userdelete");
Route::delete('/user/{id}', "UserController@destroy")->name("userdelete");

Route::get('/dashboard/user', "dashboard@user")->name('dashboarduser');
Route::get('/dashboard/request', "dashboard@request")->name('dashboardrequest');
Route::get('/dashboard/facility', "dashboard@facility")->name('dashboardfacility');