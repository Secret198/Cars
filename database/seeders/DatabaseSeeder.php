<?php

namespace Database\Seeders;

use App\Models\BoostType;
use App\Models\Brake;
use App\Models\Country;
use App\Models\CylinderLayout;
use App\Models\DriveWheels;
use App\Models\EmissionStandard;
use App\Models\EnginePlacement;
use App\Models\EngineType;
use App\Models\Generation;
use App\Models\InjectionType;
use App\Models\Rating;
use App\Models\Series;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // FuelSeeder::class,
            CarSeeder::class,
            // TransmissionSeeder::class,
            // BodyTypeSeeder::class,
            // FuelSeeder::class,
            // ColorSeeder::class,
           
        ]);
        $boostType = new BoostType(["name" => "what"]);
        $boostType->save();
        $brakes = new Brake(["name" => "what"]);
        $brakes->save();
        $countries = new Country(["name" => "what"]);
        $countries->save();
        $cylinderLayout = new CylinderLayout(["name" => "what"]);
        $cylinderLayout->save();
        $driveWheels = new DriveWheels(["name" => "what"]);
        $driveWheels->save();
        $emissionStandart = new EmissionStandard(["name" => "what"]);
        $emissionStandart->save();
        $enginePlacement = new EnginePlacement(["name" => "what"]);
        $enginePlacement->save();
        $engineType = new EngineType(["name" => "what"]);
        $engineType->save();
        $generations= new Generation(["name" => "what"]);
        $generations->save();
        $injectionType = new InjectionType(["name" => "what"]);
        $injectionType->save();
        $ratings = new Rating(["name" => "what"]);
        $ratings->save();
        $series = new Series(["name" => "what"]);
        $series->save();

        
    }
}
