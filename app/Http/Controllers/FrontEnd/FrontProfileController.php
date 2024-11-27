<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ProfileUpdateRequest;

class FrontProfileController extends Controller
{
    function upadteprofile(ProfileUpdateRequest $request): RedirectResponse{
       $user=Auth::user();
       $user->name=$request->name;
       $user->email=$request->email;
       $user->save();
       toastr()->success('Profile Update Successfully');
         return redirect()->back();
    }

    function upadteimageUser(Request $r){
         dd($r->all());
    }
}
