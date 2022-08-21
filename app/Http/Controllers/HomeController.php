<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khsing\World\World;
use Khsing\World\Models\Continent;
use App\Models\Services;
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
        return view('site.home.home',compact('continents','services'));
    }

}
