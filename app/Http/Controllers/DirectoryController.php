<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
class DirectoryController extends Controller
{
    public function index()
    {
        $results = Company::where('is_public','=','1')->get();
        return view('site.home.directory',compact('results'));
    }
}
