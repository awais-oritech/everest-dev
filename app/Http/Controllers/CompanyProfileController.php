<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Company;
use App\Models\Packages;
class CompanyProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index($id)
    {
        $services = Services::all();
        // $packages = Packages::all();
        $packs_id = Packages::where('id','=',$id)->first();
        return view('site.home.profile-registration',['services'=>$services])->with(['packs_id'=> $packs_id]);
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
        $company-> create([
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
        'startdate'=> $request->startdate,
        'branchaddress'=> $request->branchaddress,
        'companylicense'=> $request->companylicense,
        'vatnumber'=> $request->vatnumber,
        'bankdetails'=> $request->bankdetails,
        'services' =>  json_encode($request->services),
        'insurance'=> $request->insurance,
        'licensed'=> $request->licensed,
        'operatinglicense'=> $request->operatinglicense,
        'bankdetails2'=> $request->bankdetails2,
        'certification' => json_encode($request->certification),
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
        return back()->with('status','Company Registered Please Wait For Admin Approval');
    }
}
