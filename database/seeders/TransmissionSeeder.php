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

        foreach ($transmissions as $transmisssion){
            $newTransmission = new Transmission(["name" => $transmisssion]);
            $newTransmission->save();
        }
    }
}
