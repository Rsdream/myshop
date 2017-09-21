<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function welCome()
    {
        return view('Admin/welcome');
    }
    public function doLogin()
    {
        return view('Admin/login');
    }
}
