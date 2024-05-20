<?php

namespace App\Models\information;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organization extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $table = 'organizations';
    protected $primaryKey = 'org_id';
    public function user()
    {
        return $this->hasMany(User::class, 'sysId');
    }
}
