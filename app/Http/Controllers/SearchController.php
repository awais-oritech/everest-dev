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
            $results= $results->where('continent',$request->continent);
            if($request->country)
            {
                $results= $results->where('country',$request->country);
                if($request->city)
                {
                    $city=DB::table('world_cities')->where('id',$request->city)->first();
                    dd($city);
                    $results= $results->where('city',$request->city);
                }
            }

        }
        // if(){}
        $results= $results->get();
        // dd($results);
        return view('site.home.search',['results'=>$results]);
    }
}
