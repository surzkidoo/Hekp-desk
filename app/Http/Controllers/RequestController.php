<?php

namespace App\Http\Controllers;

use App\status;
use App\request;
use Illuminate\Http\Request as r;

class RequestController extends Controller

{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("index",['requests'=>request::paginate(5)]);
    }

    public function findex()
    {
        return view("findex",['requests'=>request::paginate(5),"status"=>status::get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("crequest");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(r $request)
    {
       request::create([
            "title" => $request->title,
            "description" => $request->description,
            "user_id" => auth()->user()->id
         ]);
         return redirect()->route('rpage')->with('flash','Successfully Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('feedback',['request'=>request::find($id),"status"=>status::get()]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(r $requeste)
    {
        $request=request::find($requeste->id);
        $request->status_id = $requeste->status;
        $request->save();
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\request  $request
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
            request::find($id)->delete();
            return redirect()->back();
    
 
    }
}
