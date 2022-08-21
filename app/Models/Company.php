<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->hasMany(Company_Services::class, 'company_id');
    }
}
