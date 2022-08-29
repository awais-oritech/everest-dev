<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Khsing\World\Models\City;
use Khsing\World\Models\Continent;
use Khsing\World\Models\Country;

class Company extends Model
{
    use HasFactory;
    public $table = "companies";
    protected $fillable  = [
        'user_id',
        'package_id',
        'companyname',
        'ownername',
        'companyaddress',
        'companypostal',
        'companytelephone',
        'companyemail',
        'companywebsite',
        'companyskype',
        'companyfacebook',
        'companyinstagram',
        'companyyoutube',
        'companylogo',
        'companyprofile',
        'continent',
        'country',
        'city',
        'startdate',
        'branchaddress',
        'companylicense',
        'vatnumber',
        'bankdetails',
        'insurance',
        'licensed',
        'operatinglicense',
        'bankdetails2',
        'associations',
        'companystrength',
        'member',
        'clientname',
        'clientemail',
        'clientmobile',
        'clientskype',
        'clientwhatsapp',
        'clientposition',
        'doa',
        'clientmanager',
        'gmceo',
    ];

    public function companyservices()
    {
        return $this->hasMany(CompanyServices::class, 'company_id');
    }
    public function certificates()
    {
        return $this->hasMany(CompanyCertifications::class, 'company_id');
    }
    public function cityname()
    {
        return $this->hasOne(City::class,'id','city')->select('id','name','code');
    }
    public function countryName()
    {
        return $this->hasOne(Country::class,'id','country')->select('id','name','code');
    }
    public function continentName()
    {
        return $this->hasOne(Continent::class,'id','continent')->select('id','name','code');
    }
    public function services()
    {
        return $this->hasManyThrough(
            Services::class,
            CompanyServices::class,
            'company_id', // Foreign key on the CompanyServices table
            'id', // Foreign key on the Services table
            'id', // Local key on the Company table
            'service_id', // Local key on the CompanyServices table
    );
    }
}
