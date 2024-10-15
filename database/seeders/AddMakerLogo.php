<?php

namespace Database\Seeders;

use App\Models\Maker;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddMakerLogo extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $makers = Maker::all();
        
        $i = 1;
        foreach($makers as $item){
            if(!isset($item->logo)){
                $item->update(['logo' => "yes".$i]);
            }
        }
    }
}
