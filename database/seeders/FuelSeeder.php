<?php

namespace Database\Seeders;

use App\Models\Fuel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FuelSeeder extends Seeder
{
    const FUELTYPES = [
        'benzin',
        'dízel',
        'benzin/lpg',
        'benzin/cng',
        'dízel/lpb',
        'dízel/cng',
        'hibrid (benzin)',
        'hibrid (dízel)',
        'elektromos',
        'etanol',
        'biodízel',
        'LPG',
        'CNG',
        'hidrogén'
    ];
    /**
     * Run the database seeds.
     * @return void
     */
    public function run(): void
    {

        // foreach(self::FUELTYPES as $type){
        //     $item = new Fuel(["name" => $type]);
        //     $item->save();
        // }


        if(file_exists("car-db.csv")){
            $handler = fopen("car-db.csv", "r");

            $i = 0;
            $fuels = array();
            while(($data = fgetcsv($handler, null, ",")) !== FALSE){
                if($i > 0 && !in_array($data[37], $fuels) && $data[37] != ""){
                    array_push($fuels, $data[37]);
                }
                $i++;
            }

            foreach($fuels as $fuel){
                $newFuel = new Fuel(["name" => $fuel]);
                $newFuel->save();
            }
        }
    }
}
