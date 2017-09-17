<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Admin\AdminUser;

class IndexController extends Controller
{
    public function welCome()
    {
        return view('Admin/welcome');
    }


    
}
