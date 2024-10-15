<?php

namespace App\Console\Commands;

use App\Models\Maker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\progress;

class getMakers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mysql:getMakers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        config(["database.connections.mysql.database" => "cars"]);

        if(file_exists("car-db.csv")){
            $handler = fopen("car-db.csv", "r");

            $i = 0;
            $names = array();
            while(($data = fgetcsv($handler, null, ",")) !== FALSE){
                if($i > 0){
                    if(!in_array($data[1], $names)){
                        array_push($names, $data[1]);
                    }
                }
                $i++;
            }
            
            $progress = progress(label: "Uploading maker data" , steps: count($names));
            $progress->start();

            foreach($names as $name){
                $progress->advance();
                $entity = new Maker();
                $entity->name = $name;
                $entity->save();
            }
            fclose($handler);
            $progress->finish();
        }
        
    }
}
