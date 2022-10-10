<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GlobalCoverage extends Model
{
    use HasFactory;
    protected $table='global_coverage';
    protected $guarded = [];
}
