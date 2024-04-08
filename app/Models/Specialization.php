<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Doctor;

class Specialization extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'specializations';
    public function doctor()
    {
        $this->belongsToMany(Doctor::class, "doctor_specializations");
    }
}
