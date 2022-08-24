<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
class CompanyCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $company=Company::where('user_id',Auth::user()->id)->first();
        if(isset($company->id))
        {
            if($company->status==0)
            {

                return redirect('/packages');
            }
            if($company->status==1)
            {
                return redirect('/profile-process');
            }
        }
        else
        {
            return redirect('/packages');
        }
            return $next($request);
    }
}
