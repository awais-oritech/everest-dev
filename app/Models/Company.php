<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    public $table = "company";
    protected $fillable  = [
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
        'startdate',
        'branchaddress',
        'companylicense',
        'vatnumber',
        'bankdetails',
        'services',
        'insurance',
        'licensed',
        'operatinglicense',
        'bankdetails2',
        'certification',
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
}
