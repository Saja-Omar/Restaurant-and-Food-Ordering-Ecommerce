<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    function index():View{
        return View('admin.auth.login');
    }
}
