<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
class NewsController extends Controller
{
    public function index()
    {
        $news= Blogs::paginate(6);
        $latest_blogs = Blogs::orderBy('id','DESC')->get();
        $categories = DB::table('blogcategories')->where('is_active',1)->get();
        return view('site.home.news',['news'=>$news,'categories'=>$categories,'latest_blogs'=>$latest_blogs]);
    }
}
