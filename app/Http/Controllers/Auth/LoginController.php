<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
    //  * @var string
     */
    // protected $redirectTo = "/pricing";
    protected function redirectTo()
    {
        $company=Company::where('user_id',Auth::user()->id)->first();
        if(isset($company->id))
        {
            if($company->status==0)
            {

                return '/pricing';
            }
            if($company->status==1)
            {
                return '/profile-process';
            }
        }
        else
        {
            return '/pricing';
        }
    }

    /**
     * Create a new controller instance.
     *
    //  * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/pricing');
        }

        return back()->with('message','Login details are not valid');
    }

    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect('/member');
    }
}
