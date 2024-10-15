<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Maker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use function Laravel\Prompts\progress;

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
            while(($data = fgetcsv($handler, null, ",")) !== FALSE){
                if($i > 0){
                    if(!isset($cars[$data[2]], $cars)){
                        $cars[$data[2]] = $data[1];
                    }
                }
                $i++;
            }
            $progress = progress(label: "Uploading cars" , steps: count($cars));
            $progress->start();

            foreach($cars as $key => $value){
                $progress->advance();
                $makers = Maker::all();
                $makerId = 0;
                foreach($makers as $maker){
                    if($maker->name == $value){
                        $makerId = $maker->id;
                    }
                }
                
                $item = new Car([
                    'makerID' => $makerId,
                    'name' => $key
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
