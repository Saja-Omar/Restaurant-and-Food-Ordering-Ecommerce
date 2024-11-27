<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;


use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\ProfileUpdateRequest;
use App\Http\Requests\Admin\ProfilePasswordUpadate;

class ProfileController extends Controller
{
    function index():View{
        return View('admin.profile.index');
    }

    function UpdateProfile(ProfileUpdateRequest $request):RedirectResponse{
         $user=Auth::user();
         $user->name=$request->name;
         $user->email=$request->email;
          $user->save();
          toastr('Updated successfully!','success');
        return redirect()->back();

    }
    public function UpdatePassword(ProfilePasswordUpadate $request): RedirectResponse
{

    $user = Auth::user();
    $user->password = bcrypt($request->password);
    $user->save();
    toastr()->success('Password Updated Successfully');

    return redirect()->back();
}


}
