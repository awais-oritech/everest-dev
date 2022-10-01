<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class ProfileSettingsController extends Controller
{
    public function index()
    {
        return view('site.home.profile-settings');
    }
    public  function update_password(Request $request)
    {

        if(empty($request->old_password) || empty($request->new_password))
        {
            return back()->with("error", "Old Password and New Password fields are Required");
        }
        if($request->new_password != $request->new_password_confirmation)
        {
            return back()->with("error", "New Password Doesn't match with Confirm Password");
        }
        #Match The Old Password
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Old Password Doesn't match!");
        }

        #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("success", "Password changed successfully!");
    }
}
