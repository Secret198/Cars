<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CylinderLayout extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function cars(){
        return $this->hasMany(Car::class);
    }
}
