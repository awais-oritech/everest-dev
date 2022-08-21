<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyServices;
use App\Models\Services;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        //$results = Company::query();
        // if($request->name)
        // {
        //     $results= DB::table('company_services')
        //     ->join('services', 'company_services.service_id')
        // }
        $results=Company::with(['services'=> function($qr) use ($request){
            return $qr->where('service_id',$request->service_id);
        }]);
        if($request->continent)
        {
            $results= $results->where('continent', 'LIKE', '%'.$request->continent.'%')->get();
        }
        if($request->country)
        {
            $results= $results->where('country', 'LIKE', '%'.$request->country.'%')->get();
        }
        if($request->city)
        {
            $results= $results->where('city', 'LIKE', '%'.$request->city.'%')->get();
        }

        $results= $results->get();
        return view('site.home.search',['results'=>$results]);
    }
}
