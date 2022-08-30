<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyServices;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class CompanyProfileViewController extends Controller
{
    public function index($id)
    {   

        
        $usercompany=Company::where('user_id',Auth::user()->id)->first();
        if(!isset($usercompany->id)){
            return redirect('/packages');
        }else{
            if($usercompany->status==3){
                $profile =Company::with(['services','certificates','branches'])->where('id', $id)->first();
             //   dd($profile);
                if($profile->status==3){
                    return view('site.home.company-profile',['profile'=>$profile]);
                }
                back()->with('status','Profile Not found');
            }else{
                return redirect('/profile-process');
            }
        }
       
    }
}
