<?php

namespace App\Http\Controllers;

use App\reply;
use Illuminate\Http\Request;

class replycontroller extends Controller
{
    public function store(Request $request)
    {
      
       reply::create([
            "request_id" => $request->id,
            "content" => $request->content,
            "user_id" => auth()->user()->id,
         ]);
     return redirect()->back();
    }
}
