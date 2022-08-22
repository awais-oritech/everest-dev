<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\packages;
use Illuminate\Support\Facades\DB;
class ProfileProcessController extends Controller
{
    public function index($id)
    {
        $profiles = DB::table('companies')
        ->leftjoin('packages','packages.id','=','companies.package_id')->value('package_id');
        return view('site.home.profile-process',compact('profiles'));
    }
}
