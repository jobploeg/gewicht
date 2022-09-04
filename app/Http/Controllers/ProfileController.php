<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('profile');
    }

    public function upload(Request $request)
    {
        if($request->hasFile('image')){
            $filename = $request->image->getClientOriginalName();
            $request->image->storeAs('images',$filename,'public');
            $lengte = $request->lengte;
            Auth()->user()->update(['image'=>$filename, 'lengte'=>$lengte]);
        }

        if(!$request->hasFile('image')){
            $lengte = $request->lengte;
            Auth()->user()->update(['lengte'=>$lengte]);
        }

        return view('profile');
    }
}
