<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class MemberController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return back()->with('error','You are already logged in your Account');
        }
        else
        {
            return view('auth.member');
        }
    }
}
