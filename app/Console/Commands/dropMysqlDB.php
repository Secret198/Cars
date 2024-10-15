<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class dropMysqlDB extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mysql:dropMysqlDB {name?}';

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
        $schemaName = $this->argument('name') ?: config("database.connections.mysql.database");

        $query = "DROP DATABASE IF EXISTS $schemaName;";

        DB::statement($query);
        config(["database.connections.mysql.database" => $schemaName]);
        
    }
}
