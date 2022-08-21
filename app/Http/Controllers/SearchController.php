<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Company_Services;
use App\Models\Services;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $results = Company::query();
        // if($request->name)
        // {
        //     $results= DB::table('company_services')
        //     ->join('services', 'company_services.service_id')
        // }
        $results=Company::with(['companyservices'=> function($qr) uses($request){
            return $qr->where('service_id',$request->service_id);
        }])->get();
        // if($request->continent)
        // {
        //     $results= Company::where('continent', 'LIKE', '%'.$request->continent.'%')->get();
        // }
        // if($request->country)
        // {
        //     $results= Company::where('country', 'LIKE', '%'.$request->country.'%')->get();
        // }
        // if($request->city)
        // {
        //     $results= Company::where('city', 'LIKE', '%'.$request->city.'%')->get();
        // }
        // else
        // {
        //     $results= Company::all();
        // }

        // dd($results);
        return view('site.home.search',['results'=>$results]);
    }
}
