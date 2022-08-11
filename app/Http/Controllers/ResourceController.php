<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khsing\World\World;
use Khsing\World\Models\Continent;
use Khsing\World\Models\Country;
class ResourceController extends Controller
{
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  

    public function countries(Request $request)
    {
        $continent = Continent::getByCode($request->id);
        $countries = $continent->countries()->get();
        return $countries;
    }
    public function cities(Request $request)
    {
        $country = Country::getByCode($request->id);
        $cities = $country->children();
        return $cities;
    }
    
}
