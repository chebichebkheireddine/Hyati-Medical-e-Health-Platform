<?php

namespace App\Models\MedicalRecords;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class family extends Model
{
    use HasFactory;
    protected $table = "Typefamilys";
    protected $prymaryKey = 'id';
    public $timestamps = false;
    public function familyMembers()
    {
        return $this->hasMany(FamilyMember::class, 'memberType', 'id');
    }
}
