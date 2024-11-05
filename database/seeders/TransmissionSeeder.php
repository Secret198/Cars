<?php

namespace Database\Seeders;

use App\Models\Transmission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use function Laravel\Prompts\progress;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transmissions = [
            'mechanikus',
            'félautomata',
            'automata',
            'szekvenciális',
        ];

        // foreach ($transmissions as $transmisssion){
        //     $newTransmission = new Transmission(["name" => $transmisssion]);
        //     $newTransmission->save();
        // }

        if(file_exists("car-db.csv")){
            $handler = fopen("car-db.csv", "r");

            $i = 0;
            $transmissions = array();
            while(($data = fgetcsv($handler, null, ",")) !== FALSE){
                if($i > 0 && !in_array($data[54], $transmissions) && $data[54] != ""){
                    array_push($transmissions, $data[54]);
                }
                $i++;
            }

            foreach($transmissions as $transmisssion){
                $newTrans = new Transmission(["name" => $transmisssion]);
                $newTrans->save();
            }
        }
    }
}
