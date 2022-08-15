<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_Services extends Model
{
    use HasFactory;
    public $table = "company_services";
    protected $guarded = [];
}
