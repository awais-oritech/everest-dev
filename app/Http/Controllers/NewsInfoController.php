<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Categories;
class NewsInfoController extends Controller
{
    public function index($id)
    {
        $news_ifo = Blogs::where('id', '=', $id)->get();
        $latest_blogs = Blogs::orderBy('id','DESC')->get();
        $categories = Categories::all();
        return view('site.home.newsinfo',['news_info'=>$news_ifo,'latest_blogs'=>$latest_blogs,'categories'=>$categories]);
    }
}
