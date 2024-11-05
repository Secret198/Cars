<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Fuel;
use App\Models\Color;
use App\Models\Maker;
use App\Models\BodyType;
use App\Models\Transmission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\progress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(file_exists("car-db.csv")){
            $handler = fopen("car-db.csv", "r");

            $i = 0;
            $cars = array();
            $carData = array();
            while(($data = fgetcsv($handler, null, ",")) !== FALSE){
                if($i > 0){
                    $carRecord = array();
                    $carRecord["body_type"] = $data[8];
                    $carRecord["transmission"] = $data[54];
                    $carRecord["fuel"] = $data[37];
                    $carRecord["maker"] = $data[1];
                    $carRecord["name"] = $data[2];
                    array_push($carData, $carRecord);
                    // if(!isset($cars[$data[2]], $cars)){
                    //     $cars[$data[2]] = $data[1];
                    // }
                }
                $i++;
            }
            $progress = progress(label: "Uploading cars" , steps: count($carData));
            $progress->start();

            $colors = Color::all();

            $colorIds = array();

            foreach($colors as $color){
                array_push($colorIds, $color->id);
            }


            for($j = 0; $j < 200; $j++){
                $progress->advance();

                $makerId = $carData[$j]["maker"] ? Maker::select("id")->where("name", $carData[$j]["maker"])->first()->id : null;
                $transmissionId = $carData[$j]["transmission"] ? Transmission::select("id")->where("name", $carData[$j]["transmission"])->first()->id : null;
                $bodyTypeId = $carData[$j]["body_type"] ? BodyType::select("id")->where("name", $carData[$j]["body_type"])->first()->id : null;
                $fuelId = $carData[$j]["fuel"] ? Fuel::select("id")->where("name", $carData[$j]["fuel"])->first()->id : null;


                $item = new Car([
                    'maker_id' => $makerId,
                    'name' => $carData[$j]["name"],
                    'transmission_id' => $transmissionId,
                    'body_type_id' => $bodyTypeId,
                    'fuel_id' => $fuelId,
                    'color_id' => fake()->randomElement($colorIds),
                    "generation_id" => 1,
                    "series_id" => 1,
                    "injection_type_id" => 1,
                    "cylinder_layout_id" => 1,
                    "engine_placement_id" => 1,
                    "drive_wheels_id" => 1,
                    "engine_type_id" => 1,
                    "rear_brakes_id" => 1,
                    "front_brakes_id" => 1,
                    "country_id" => 1,
                ]);
                $item->save();

           
                // DB::table("car")->insert([
                //     "name" => $car[2],
                //     "makerID" => $makerId
                // ]);
            }
            fclose($handler);
            $progress->finish();
        }

        
    }
}
