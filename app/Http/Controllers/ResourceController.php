<?php

namespace App\Http\Controllers;

use App\Models\NewsLetter;
use Illuminate\Http\Request;
use Khsing\World\World;
use Khsing\World\Models\Continent;
use Khsing\World\Models\Country;
use Khsing\World\Models\City;
use Illuminate\Support\Facades\Artisan;
class ResourceController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  

    public function countries(Request $request)
    {
        $countries = Country::where('continent_id',$request->id)->get();
       // $countries = $continent->countries()->get();
        return $countries;
    }
    public function cities(Request $request)
    {
        $cities = City::where('country_id',$request->id)->get();
        //$cities = $country->children();
        return $cities;
    }
    public function newsletter(Request $request)
    {
        $newsletter = new NewsLetter();
        $newsletter->email=$request->email;
        $newsletter->save();
        return array('status'=>true);
    }
    
    
}
