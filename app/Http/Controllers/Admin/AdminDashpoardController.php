<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;


class AdminDashpoardController extends Controller
{
     function index():View{
        return View('admin.dashpoard.index');
    }

}
