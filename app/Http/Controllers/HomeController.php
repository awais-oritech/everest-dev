<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khsing\World\World;
use Khsing\World\Models\Continent;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
<<<<<<< HEAD
    // public function __construct()
    // {

    //     $this->middleware('auth');
    // }
=======
    public function __construct()
    {
       
        //$this->middleware('auth');
    }
>>>>>>> 2bb84d5b281de3ff92c861d05b2d1007ddb33225

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $continents=World::Continents();
<<<<<<< HEAD
        $cities = World::Countries();
        return view('site.home.home',compact('continents','cities'));
=======
        return view('site.home.home',compact('continents'));
>>>>>>> 2bb84d5b281de3ff92c861d05b2d1007ddb33225
    }

}
