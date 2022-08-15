<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;


class SearchController extends Controller
{
    public function index(Request $request)
    {
        $results = Company::query();
        if($request->continent)
        {
            $results= Company::where('continent', 'LIKE', '%'.$request->continent.'%')->get();
        }
        if($request->country)
        {
            $results= Company::where('country', 'LIKE', '%'.$request->country.'%')->get();
        }
        if($request->city)
        {
            $results= Company::where('city', 'LIKE', '%'.$request->city.'%')->get();
        }
        else
        {
            $results= Company::all();
        }
        // dd($results);
        return view('site.home.search',['results'=>$results]);
    }
}
