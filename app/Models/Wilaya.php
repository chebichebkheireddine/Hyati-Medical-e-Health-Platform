<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'wilayas';
    protected $primaryKey = 'id';
    public function communes()
    {
        return $this->hasMany(Commune::class, 'wilaya_id', 'id');
    }
}
