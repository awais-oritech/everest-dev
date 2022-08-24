<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Benefit;
class BenefitsController extends Controller
{
    public function index()
    {
        $benefits = Benefit::all();
        return view('site.home.benefits',compact('benefits'));
    }
}
