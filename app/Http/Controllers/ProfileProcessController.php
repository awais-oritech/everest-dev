<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class ProfileProcessController extends Controller
{
    public function index()
    {
        return view('site.home.profile-process');
    }
}
