<?php

namespace App\Models\information;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class organizationType extends Model
{
    use HasFactory;
    protected $table = 'organization_types';
    public $timestamps = false;
    protected $primaryKey = 'type_id';

    public function organization()
    {
        return $this->hasMany(organization::class, 'org_type');
    }
}
