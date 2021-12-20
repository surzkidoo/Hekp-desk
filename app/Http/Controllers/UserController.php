<?php

namespace App\Http\Controllers;

use auth;
use App\User;
use Illuminate\Http\Request as r;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\UserController;

class UserController extends Controller
{
    public function passpage()
    {
        return view('password');
    }
    public function pass(r $request)
    
    {
        if(Hash::check($request->old,auth()->user()->password)){
              auth()->user()->password= bcrypt($request->new);
              auth()->user()->save();
        }
        else{
            return redirect()->back();
        }
      
        return redirect()->back();
    }

    public function destroy($id)
    {
           User::find($id)->delete();
           return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
