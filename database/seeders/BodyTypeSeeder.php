<?php

namespace Database\Seeders;

use App\Models\BodyType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $bodyTypes = [
            'Crossover',
            'Fastback',
            'Hardtop',
            'Hatchback',
            'Kabrió',
            'Kombi',
            'Kupé',
            'Liftback',
            'Limuzin',
            'Minivan',
            'Pickup',
            'Roadster',
            'Szedán',
            'Targa',
        ];

        // foreach ($bodyTypes as $bodyType){
        //     $newBodyType = new BodyType(["name" => $bodyType]);
        //     $newBodyType->save();
        // }

        if(file_exists("car-db.csv")){
            $handler = fopen("car-db.csv", "r");

            $i = 0;
            $bodyTypes = array();
            while(($data = fgetcsv($handler, null, ",")) !== FALSE){
                if($i > 0 && !in_array($data[8], $bodyTypes) && $data[8] != ""){
                    array_push($bodyTypes, $data[8]);
                }
                $i++;
            }

            foreach($bodyTypes as $bodyType){
                $newBodyType = new BodyType(["name" => $bodyType]);
                $newBodyType->save();
            }
        }
    }
}
