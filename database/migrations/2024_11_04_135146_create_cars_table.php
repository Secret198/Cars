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
            $table->unsignedBigInteger("maker_id");
            $table->foreign("maker_id")->references("id")->on("makers")->onDelete("cascade");
            
            $table->unsignedBigInteger("generation_id")->nullable();
            $table->foreign("generation_id")->references("id")->on("generations")->onDelete("cascade");

            $table->integer("year_from")->nullable();
            $table->integer("year_to")->nullable();
            $table->unsignedBigInteger("series_id")->nullable();
            $table->foreign("series_id")->references("id")->on("series")->onDelete("cascade");

            $table->string("trim")->nullable();
            $table->unsignedBigInteger("body_type_id")->nullable();
            $table->foreign("body_type_id")->references("id")->on("body_types")->onDelete("cascade");

            $table->integer("load_height")->nullable();
            $table->integer("number_of_seats")->nullable();
            $table->integer("length_mm")->nullable();
            $table->integer("width_mm")->nullable();
            $table->integer("height_mm")->nullable();
            $table->integer("wheelbase_mm")->nullable();
            $table->integer("front_track_mm")->nullable();
            $table->integer("rear_track_mm")->nullable();
            $table->integer("curb_weight_kb")->nullable();
            $table->integer("wheel_size_r14")->nullable();
            $table->integer("ground_clearence_mm")->nullable();
            $table->integer("trailer_load_with_brakes_kg")->nullable();
            $table->integer("payload_kb")->nullable();
            $table->integer("back_track_width_mm")->nullable();
            $table->integer("front_track_width_mm")->nullable();
            $table->integer("clearence_mm")->nullable();
            $table->integer("full_weigth_kg")->nullable();
            $table->integer("front_rear_axle_load_kg")->nullable();
            $table->integer("max_trunk_capacity_l")->nullable();
            $table->integer("maximum_torque_nm")->nullable();
            $table->unsignedBigInteger("injection_type_id")->nullable();
            $table->foreign("injection_type_id")->references("id")->on("injection_type")->onDelete("cascade");

            $table->string("overhead_camshaft")->nullable();
            $table->unsignedBigInteger("cylinder_layout_id")->nullable();
            $table->foreign("cylinder_layout_id")->references("id")->on("cylinder_layout")->onDelete("cascade");

            $table->integer("number_of_cylinders")->nullable();
            $table->float("compression_ratio")->nullable();
            $table->unsignedBigInteger("engine_type_id")->nullable();
            $table->foreign("engine_type_id")->references("id")->on("engine_type")->onDelete("cascade");

            $table->integer("valves_per_cylinder")->nullable();
            $table->unsignedBigInteger("boost_type_id")->nullable();
            $table->foreign("boost_type_id")->references("id")->on("boost_type")->onDelete("cascade");

            $table->integer("cylinder_bore_mm")->nullable();
            $table->integer("stroke_cycle_mm")->nullable();
            $table->unsignedBigInteger("engine_placement_id")->nullable();
            $table->foreign("engine_placement_id")->references("id")->on("engine_placement")->onDelete("cascade");

            $table->string("cylinder_bore_and_stroke_cycle_mm")->nullable();
            $table->string("turnover_of_maximum_torque_rpm")->nullable();

            $table->integer("max_power_kw")->nullable();
            $table->string("presence_of_intercooler")->nullable();
            $table->integer("capacity_cm3")->nullable();
            $table->integer("engine_hp")->nullable();
            $table->integer("engine_hp_rpm")->nullable();
            $table->unsignedBigInteger("drive_wheels_id")->nullable();
            $table->foreign("drive_wheels_id")->references("id")->on("drive_wheels")->onDelete("cascade");

            $table->float("bore_stroke_ratio")->nullable();
            $table->integer("number_of_gears")->nullable();
            $table->integer("turning_circle_m")->nullable();
            $table->unsignedBigInteger("transmission_id")->nullable();
            $table->foreign("transmission_id")->references("id")->on("transmissions")->onDelete("cascade");

            $table->float("max_fuel_consumption_per_100km_l")->nullable();
            $table->string("range_km")->nullable();
            $table->unsignedBigInteger("emission_standards_id")->nullable();
            $table->foreign("emission_standards_id")->references("id")->on("emission_standards")->onDelete("cascade");

            $table->integer("fuel_tank_capacity_l")->nullable();
            $table->float("acceleration_0_100km_s")->nullable();
            $table->integer("max_speed_km_per_h")->nullable();
            $table->integer("city_fuel_per_100km_l")->nullable();
            $table->integer("co2_emission_g_per_km")->nullable();
            $table->unsignedBigInteger("fuel_id")->nullable();
            $table->foreign("fuel_id")->references("id")->on( "fuels")->onDelete("cascade");

            $table->string("back_suspension")->nullable();
            $table->string("front_suspension")->nullable();
            $table->unsignedBigInteger("rear_brakes_id")->nullable();
            $table->foreign("rear_brakes_id")->references("id")->on("brakes")->onDelete("cascade");

            $table->unsignedBigInteger("front_brakes_id")->nullable();
            $table->foreign("front_brakes_id")->references("id")->on("brakes")->onDelete("cascade");

            $table->string("steering_type")->nullable();
            $table->string("car_class")->nullable();
            $table->unsignedBigInteger("country_id")->nullable();
            $table->foreign("country_id")->references("id")->on("countries")->onDelete("cascade");

            $table->integer("number_of_doors")->nullable();
            $table->string("safety_assessment")->nullable();
            $table->unsignedBigInteger("rating_name_id")->nullable();
            $table->foreign("rating_name_id")->references("id")->on("ratings")->onDelete("cascade");

            $table->float("battery_capacity_KW_per_h")->nullable();
            $table->integer("electric_range_km")->nullable();
            $table->float("charing_time_h")->nullable();
            $table->unsignedBigInteger("color_id")->nullable();
            $table->foreign("color_id")->references("id")->on("colors")->onDelete("cascade");


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
