<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Services;
use App\Models\Company;
use App\Models\Company_Certifications;
use App\Models\Company_Services;
use App\Models\Packages;
use App\Models\User;
use Khsing\World\World;
use Khsing\World\Models\Continent;
use Khsing\World\Models\Country;
class CompanyProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $services = Services::all();
        $continents=World::Continents();
        $profile = Company::where('user_id', Auth::user()->id)->first();
        $packs_id = Packages::where('id','=',$id)->first();
        $country = Country::getByCode($profile->country);
        $cities = $country->children();
        if(isset($profile))
        $compact =[
            'services'=>$services ,
             'packs_id'=> $packs_id,
             'continents'=>$continents,
             'profile'=>$profile,
            //  'company_id'=>$company_id,
            ];
        return view('site.home.profile-registration', $compact);
    }

    public function store(Request $request)
    {
       // dd($request);
        if($file=$request->hasfile('companylogo'))
        {
            $file=$request->file('companylogo');
            $fileName=uniqid().$file->getClientOriginalName();
            $destinationPath=public_path().'/uploads/';
            $file->move($destinationPath,$fileName);
            $request->companylogo=$fileName;
        }
        $company = new Company();
        $company=Company::create([
        'user_id'=>request()->user()->id,
        'package_id' =>$request->package_id,
        'companyname'=> $request ->companyname,
        'ownername'=> $request->ownername,
        'companyaddress'=> $request->companyaddress,
        'companypostal'=> $request->companypostal,
        'companytelephone'=> $request->companytelephone,
        'companyemail'=> $request->companyemail,
        'companywebsite'=> $request->companywebsite,
        'companyskype'=> $request->companyskype,
        'companyfacebook'=> $request->companyfacebook,
        'companyinstagram'=> $request->companyinstagram,
        'companyyoutube'=> $request->companyyoutube,
        'companylogo'=> $request->companylogo,
        'companyprofile'=> $request->companyprofile,
        'continent'=> $request->continent,
        'country'=> $request->country,
        'city'=> $request->city,
        'startdate'=> $request->startdate,
        'branchaddress'=> $request->branchaddress,
        'companylicense'=> $request->companylicense,
        'vatnumber'=> $request->vatnumber,
        'bankdetails'=> $request->bankdetails,
        'insurance'=> $request->insurance,
        'licensed'=> $request->licensed,
        'operatinglicense'=> $request->operatinglicense,
        'bankdetails2'=> $request->bankdetails2,
        'associations'=> $request->associations,
        'companystrength'=> $request->companystrength,
        'member'=> $request->member,
        'clientname'=> $request->clientname,
        'clientemail'=> $request->clientemail,
        'clientmobile'=> $request->clientmobile,
        'clientskype'=> $request->clientskype,
        'clientwhatsapp'=> $request->clientwhatsapp,
        'clientposition'=> $request->clientposition,
        'doa'=> $request->doa,
        'clientmanager'=> $request->clientmanager,
        'gmceo'=> $request->gmceo,
        ]);
        //dd($company->id);
        for($i=0; $i < count($request->service_name); $i++)
        {
            $service_name[]=[
                'company_id' => $company->id,
                'service_id' => $request->service_name[$i],
            ];
        }
        foreach($request->service_name as $service){
            $service_name[]=[
                'company_id' => $company->id,
                'service_id' => $service,
            ];
        }
        Company_Services::insert($service_name);

        for($i=0; $i < count($request->certification_name); $i++)
        {
            $certification_name[]=[
                'company_id' => $company->id,
                'certification_name' => $request->certification_name[$i],
            ];
        }
        Company_Certifications::insert($certification_name);
        return back()->with('status','Company Registered Please Wait For Admin Approval');
    }
}
