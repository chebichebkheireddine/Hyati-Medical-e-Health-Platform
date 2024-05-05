<?php

namespace App\Models\Apimodel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Patient extends Model
{
    use HasFactory, HasApiTokens;
    protected $table = 'patients';
    protected $primaryKey = 'healthId';

    // protected $timestamps = false;
}
