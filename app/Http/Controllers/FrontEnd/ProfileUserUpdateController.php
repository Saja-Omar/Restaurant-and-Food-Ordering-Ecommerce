<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Requests\FrontEnd\RequestUpdateUserrr;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class ProfileUserUpdateController extends Controller
{
    public function UpdateProfile(RequestUpdateUserrr $request): RedirectResponse
    {
        $user = Auth::user();
        $user->password = bcrypt($request->password);
        $user->save();

        toastr('Updated successfully!', 'success');
        return redirect()->back();
    }
}

