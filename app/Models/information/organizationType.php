<?php

namespace App\Models\information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organizationType extends Model
{
    use HasFactory;
    protected $table = 'organization_types';
    public $timestamps = false;
}
