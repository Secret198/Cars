<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("maker_id");
            $table->foreign("maker_id")->references("id")->on("makers")->onDelete("cascade");
            
            $table->integer("generation_id");
            $table->foreign("generation_id")->references("id")->on("generation")->onDelete("cascade");

            $table->integer("year_from");
            $table->integer("year_to");
            $table->integer("series_id");
            $table->foreign("series_id")->references("id")->on("series")->onDelete("cascade");

            $table->string("trim");
            $table->string("body_type_id");
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
