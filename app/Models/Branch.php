<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Khsing\World\Models\City;
use Khsing\World\Models\Country;
use Khsing\World\Models\Continent;
class Branch extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $guarded = [];
    protected $with = ['continentName','countryName','cityName'];

    public function continentName()
    {
        return $this->hasOne(Continent::class,'id','continent')->select('id','name','code');
    }
    public function countryName()
    {
        return $this->hasOne(Country::class,'id','country')->select('id','name','code');
    }
    public function cityName()
    {
        return $this->hasOne(City::class,'id','city')->select('id','name','code');
    }
}
