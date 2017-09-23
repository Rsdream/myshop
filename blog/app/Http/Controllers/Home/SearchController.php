<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\Search;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $key = $request->input('key');
        $search = new search('shop');
        $arr = $search->doSearch($key);
        dd($arr);
    }
}
