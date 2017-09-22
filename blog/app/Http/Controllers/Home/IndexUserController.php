<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexUserController extends Controller
{
    public function myAccount() {
        return view('Home/user/my_account');
    }
}
