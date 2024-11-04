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
            
            $table->unsignedBigInteger("generation_id");
            $table->foreign("generation_id")->references("id")->on("generation")->onDelete("cascade");

            $table->integer("year_from");
            $table->integer("year_to");
            $table->unsignedBigInteger("series_id");
            $table->foreign("series_id")->references("id")->on("series")->onDelete("cascade");

            $table->string("trim");
            $table->unsignedBigInteger("body_type_id");
            $table->foreign("body_type_id")->references("id")->on("body_type")->onDelete("cascade");

            $table->integer("load_height");
            $table->integer("number_of_seats");
            $table->integer("length_mm");
            $table->integer("width_mm");
            $table->integer("height_mm");
            $table->integer("wheelbase_mm");
            $table->integer("front_track_mm");
            $table->integer("rear_track_mm");
            $table->integer("curb_weight_kb");
            $table->integer("wheel_size_r14");
            $table->integer("ground_clearence_mm");
            $table->integer("trailer_load_with_brakes_kg");
            $table->integer("payload_kb");
            $table->integer("back_track_width_mm");
            $table->integer("front_track_width_mm");
            $table->integer("clearence_mm");
            $table->integer("full_weigth_kg");
            $table->integer("front_rear_axle_load_kg");
            $table->integer("max_trunk_capacity_l");
            $table->integer("maximum_torque_nm");
            $table->unsignedBigInteger("injection_type_id");
            $table->foreign("injection_type_id")->references("id")->on("injection_type")->onDelete("cascade");

            $table->string("overhead_camshaft");
            $table->unsignedBigInteger("cylinder_layout_id");
            $table->foreign("cylinder_layout_id")->references("id")->on("cylinder_layout")->onDelete("cascade");

            $table->integer("number_of_cylinders");
            $table->float("compression_ratio");
            $table->unsignedBigInteger("engine_type_id");
            $table->foreign("engine_type_id")->references("id")->on("engine_type")->onDelete("cascade");

            $table->integer("valves_per_cylinder");
            $table->unsignedBigInteger("boost_type_id");
            $table->foreign("boost_type_id")->references("id")->on("boost_type")->onDelete("cascade");

            $table->integer("cylinder_bore_mm");
            $table->integer("stroke_cycle_mm");
            $table->unsignedBigInteger("engine_placement_id");
            $table->foreign("engine_placement_id")->references("id")->on("engine_placement")->onDelete("cascade");

            $table->string("cylinder_bore_and_stroke_cycle_mm");
            $table->string("turnover_of_maximum_torque_rpm");

            $table->integer("max_power_kw");
            $table->string("presence_of_intercooler");
            $table->integer("capacity_cm3");
            $table->integer("engine_hp");
            $table->integer("engine_hp_rpm");
            $table->unsignedBigInteger("drive_wheels_id");
            $table->foreign("drive_wheels_id")->references("id")->on("drive_wheels")->onDelete("cascade");

            $table->float("bore_stroke_ratio");
            $table->integer("number_of_gears");
            $table->integer("turning_circle_m");
            $table->unsignedBigInteger("transmission_id");
            $table->foreign("transmission_id")->references("id")->on("transmission")->onDelete("cascade");

            $table->float("max_fuel_consumption_per_100km_l");
            $table->string("range_km");
            $table->unsignedBigInteger("emission_standards_id");
            $table->foreign("emission_standards_id")->references("id")->on("emission_standards")->onDelete("cascade");

            $table->integer("fuel_tank_capacity_l");
            $table->float("acceleration_0_100km_s");
            $table->integer("max_speed_km_per_h");
            $table->integer("city_fuel_per_100km_l");
            $table->integer("co2_emission_g_per_km");
            $table->unsignedBigInteger("fuel_grade_id");
            $table->foreign("fuel_grade_id")->references("id")->on( "fuels")->onDelete("cascade");

            $table->string("back_suspension");
            $table->string("front_suspension");
            $table->unsignedBigInteger("rear_brakes_id");
            $table->foreign("rear_brakes_id")->references("id")->on("brakes")->onDelete("cascade");

            $table->unsignedBigInteger("front_brakes_id");
            $table->foreign("front_brakes_id")->references("id")->on("brakes")->onDelete("cascade");

            $table->string("steering_type");
            $table->string("car_class");
            $table->unsignedBigInteger("country_id");
            $table->foreign("country_id")->references("id")->on("countries")->onDelete("cascade");

            $table->integer("number_of_doors");
            $table->string("safety_assessment");
            $table->unsignedBigInteger("rating_name_id");
            $table->foreign("rating_name_id")->references("id")->on("ratings")->onDelete("cascade");

            $table->float("battery_capacity_KW_per_h");
            $table->integer("electric_range_km");
            $table->float("charing_time_h");
            $table->unsignedBigInteger("color_id");
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
