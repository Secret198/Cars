<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function maker(){
        return $this->belongsTo(Maker::class);
    }

    public function generation(){
        return $this->belongsTo(Generation::class);
    }

    public function emissionStandard(){
        return $this->belongsTo(EmissionStandard::class);
    }

    public function series(){
        return $this->belongsTo(Series::class);
    }

    public function bodyType(){
        return $this->belongsTo(BodyType::class);
    }

    public function injectionType(){
        return $this->belongsTo(InjectionType::class);
    }

    public function cylinderLayout(){
        return $this->belongsTo(CylinderLayout::class);
    }

    public function engineType(){
        return $this->belongsTo(EngineType::class);
    }

    public function boostType(){
        return $this->belongsTo(BoostType::class);
    }

    public function enginePlacement(){
        return $this->belongsTo(EnginePlacement::class);
    }

    public function driveWheels(){
        return $this->belongsTo(DriveWheels::class);
    }

    public function transmission(){
        return $this->belongsTo(Transmission::class);
    }

    public function fuel(){
        return $this->belongsTo(Fuel::class);
    }

    public function rearBrake(){
        return $this->belongsTo(Brake::class);
    }

    public function frontBrake(){
        return $this->belongsTo(Brake::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function color(){
        return $this->belongsTo(Color::class);
    }
}
