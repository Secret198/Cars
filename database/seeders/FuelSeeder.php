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

        foreach(self::FUELTYPES as $type){
            $item = new Fuel(["name" => $type]);
            $item->save();
        }

    }
}
