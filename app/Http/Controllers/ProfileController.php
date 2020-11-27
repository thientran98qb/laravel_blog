<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request){
        $profile=User::findOrFail($request->user()->id)->profile;
        return view('frontend.profiles.index',compact('profile'));
    }
}
