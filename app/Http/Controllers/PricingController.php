<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Packages;

class PricingController extends Controller
{
    
    public function index()
    {
        $packages = Packages::all();
        return view('site.home.pricing',['packages'=>$packages]);
    }

}
