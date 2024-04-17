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

    protected $guarded = [];
    // protected $fillable = ['name', 'user_name', 'email', 'password', 'phone_number', 'address'];

    protected $hidden = [
        'password',

    ];
    protected $table = "doctors";
    public $timestamps = false;
    public function specialization()
    {
        return $this->belongsToMany(Specialization::class, 'doctor_specializations', 'doctor_id', 'specialization_id');
    }
}
