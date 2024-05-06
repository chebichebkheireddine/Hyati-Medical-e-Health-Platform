<?php

namespace App\Models\MedicalRecords;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drugs extends Model
{
    use HasFactory;
    protected $table = 'drugs';
    protected $prymaryKey = 'id';
    public function medications()
    {
        return $this->belongsTo(Medication::class, 'drugId', 'id');
    }
}
