<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Khsing\World\World;
use Khsing\World\Models\Continent;
use App\Models\Services;
use App\Models\Sponser;
use App\Models\Benefit;
use App\Models\Page;
use App\Models\Blogs;
use App\Models\GlobalCoverage;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd(Auth::user()->id);
        $continents=Continent::all();
        $services = Services::all();
        $sponsers = Sponser::where('category_id', 1)->get();
        $benefits = Benefit::all();
        $news = Blogs::orderBy('id','desc')->limit(3)->get();
        $diamonds = Sponser::where('category_id',2)->get();
        $abouts = About::get()->first();
        $globals = GlobalCoverage::all();
        return view('site.home.home',compact('continents','services','sponsers','benefits','news','diamonds','abouts','globals'));
    }

}
