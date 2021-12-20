<?php

namespace App\Http\Controllers;

use App\User;
use App\request;


class dashboard extends Controller
{
    public function user(){
        
       
        return view("dashboarduser",['user'=>User::where('role_id','=','1')->paginate(20)]);
    }
    public function facility(){
        
       
        return view("dashboardfacility",['user'=>User::where('role_id','=','2')->paginate(20)]);
    }

    public function request(){
        
       
        return view("dashboardrequest",['requests'=>request::paginate(20)]);
    }
}
