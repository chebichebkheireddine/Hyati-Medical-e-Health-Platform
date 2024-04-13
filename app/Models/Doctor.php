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

    // protected $guarded = [];
    protected $fillable = ['name', 'user_name', 'email', 'password', 'phone_number', 'address'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',

    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    use HasFactory;
    protected $table = "doctors";
    protected $timestamps = false;
    public function specialization()
    {
        $this->belongsToMany(Specialization::class, "doctor_specializations");
    }
}
