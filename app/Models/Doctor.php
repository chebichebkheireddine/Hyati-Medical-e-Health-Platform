<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Spatie\Permission\Traits\HasRoles;

class Doctor extends Authenticatable

{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'doctor';
    protected $table = "doctors";
    protected $primaryKey = 'sysId';
    

    public $timestamps = false;
    public function specialization()
    {
        return $this->belongsToMany(Specialization::class, 'doctor_specializations', 'doctor_id', 'specialization_id');
    }
}