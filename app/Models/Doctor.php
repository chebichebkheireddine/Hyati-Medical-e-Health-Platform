<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    // protected $table = 'doctors';
    public function specialization()
    {
        $this->belongsToMany(Specialization::class, "doctor_specializations");
    }
}
