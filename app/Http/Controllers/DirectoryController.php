<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Khsing\World\Models\Continent;
use App\Models\Services;
class DirectoryController extends Controller
{
    public function index()
    {
        // $results = Company::where('status',3)->get();
        $continents=Continent::all();
        $services = Services::all();
        return view('site.home.directory',compact('continents','services'));
    }
}
