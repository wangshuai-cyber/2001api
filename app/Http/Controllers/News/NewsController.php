<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
class NewsController extends Controller
{
    function news(){
        $res=Category::get();

        return view('/news',['res'=>$res]);
    }
}
