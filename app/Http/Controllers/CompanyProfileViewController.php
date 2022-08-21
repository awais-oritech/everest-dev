<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\CompanyServices;
use Illuminate\Support\Facades\DB;
class CompanyProfileViewController extends Controller
{
    public function index($id)
    {

        $profile =Company::with(['services','certificates'])->where('id', $id)->first();
        return view('site.home.company-profile',['profile'=>$profile]);
    }
}
