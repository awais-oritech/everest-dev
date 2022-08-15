<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Company_Services;
use Illuminate\Support\Facades\DB;
class CompanyProfileViewController extends Controller
{
    public function index($id)
    {
        $profile_data = Company::where('id', '=', $id)->get();
        $profile_services = DB::table('company_services')
        ->Join('companies', 'companies.id','=','company_services.company_id')
        ->where('company_Services.company_id', '=', $id)->get();
        $profile_certification = DB::table('company_certifications')
        ->Join('companies', 'companies.id', '=', 'company_certifications.company_id')
        ->where('company_certifications.company_id','=',$id)->get();
        return view('site.home.company-profile',['profile_data'=>$profile_data, 'profile_services'=>$profile_services, 'profile_certification'=>$profile_certification]);
    }
}
