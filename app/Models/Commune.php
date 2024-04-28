<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commune extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'communes';
    protected $primaryKey = 'id';
    public function wilaya()
    {
        return $this->belongsTo(Wilaya::class, 'wilaya_id', 'id');
    }
}
