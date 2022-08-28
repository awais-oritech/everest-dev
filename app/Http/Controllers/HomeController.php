<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khsing\World\World;
use Khsing\World\Models\Continent;
use App\Models\Services;
use App\Models\Sponser;
use App\Models\Benefit;
use App\Models\Page;
use App\Models\Blogs;

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
        $continents=World::Continents();
        $services = Services::all();
        $sponsers = Sponser::where('category_id', 1)->get();
        $benefits = Benefit::all();
        $news = Blogs::orderBy('id','desc')->limit(3)->get();
        $diamonds = Sponser::where('category_id',2)->get();
        return view('site.home.home',compact('continents','services','sponsers','benefits','news','diamonds'));
    }

}
