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
        
        $logoNames = scandir("./public/logos");
        foreach($logoNames as $logo){
            
            Maker::where("name", str_replace("_", " ", explode(".", $logo)[0]))->update(["logo" => "/logos/".$logo]);
        }
    }
}
