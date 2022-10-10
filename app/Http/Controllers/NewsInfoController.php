<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Categories;
use App\Models\BlogCategory;
class NewsInfoController extends Controller
{
    public function index($id)
    {
        $news_ifo = Blogs::where('id', '=', $id)->get();
        $latest_blogs = Blogs::orderBy('id','DESC')->get();
        $categories = BlogCategory::where('is_active',1)->get();
        return view('site.home.newsinfo',['news_info'=>$news_ifo,'latest_blogs'=>$latest_blogs,'categories'=>$categories]);
    }
}
