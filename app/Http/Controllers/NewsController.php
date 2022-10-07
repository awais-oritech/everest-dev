<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\Blogs;
use App\Models\Categories;
use Illuminate\Support\Facades\DB;
class NewsController extends Controller
{
    public function index()
    {
        $news= Blogs::where('is_active',1)->paginate(6);
        $latest_blogs = Blogs::where('is_active',1)->orderBy('id','DESC')->get();
        $categories = BlogCategory::where('is_active',1)->get();
        return view('site.home.news',['news'=>$news,'categories'=>$categories,'latest_blogs'=>$latest_blogs]);
    }
    public function bycat($id)
    {
        $category = BlogCategory::where('id',$id)->first();
       // dd($category);
        $news= Blogs::where('category_id',$id)->where('is_active',1)->paginate(6);
        $latest_blogs = Blogs::orderBy('id','DESC')->get();
        $categories = BlogCategory::where('is_active',1)->get();
        return view('site.home.news',['category'=>$category,'news'=>$news,'categories'=>$categories,'latest_blogs'=>$latest_blogs]);
    }
}
