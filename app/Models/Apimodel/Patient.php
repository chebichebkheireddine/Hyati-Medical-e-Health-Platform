<?php

namespace App\Models\Apimodel;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Patient extends Model implements JWTSubject
{
    use HasFactory, HasApiTokens;
    protected $fillable = ['email', 'firstName', 'password'];

    protected $table = 'patients';
    protected $primaryKey = 'healthId';

    public $timestamps = false;

    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    // Rest omitted for brevity

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
}
