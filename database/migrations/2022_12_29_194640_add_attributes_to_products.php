<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('working_area_id')->index()->nullable();
            $table->foreign('working_area_id')->references('id')->on('attribute_values')->cascadeOnDelete();
            $table->unsignedBigInteger('motor_id')->index()->nullable();
            $table->foreign('motor_id')->references('id')->on('attribute_values')->cascadeOnDelete();
            $table->unsignedBigInteger('weight_id')->index()->nullable();
            $table->foreign('weight_id')->references('id')->on('attribute_values')->cascadeOnDelete();
            $table->unsignedBigInteger('max-working_speed_id')->index()->nullable();
            $table->foreign('max-working_speed_id')->references('id')->on('attribute_values')->cascadeOnDelete();
            $table->unsignedBigInteger('max-traveling_speed_id')->index()->nullable();
            $table->foreign('max-traveling_speed_id')->references('id')->on('attribute_values')->cascadeOnDelete();
            $table->unsignedBigInteger('head_diameter_id')->index()->nullable();
            $table->foreign('head_diameter_id')->references('id')->on('attribute_values')->cascadeOnDelete();
            $table->unsignedBigInteger('bottom_diameter_id')->index()->nullable();
            $table->foreign('bottom_diameter_id')->references('id')->on('attribute_values')->cascadeOnDelete();
            $table->unsignedBigInteger('bottom_zone_id')->index()->nullable();
            $table->foreign('bottom_zone_id')->references('id')->on('attribute_values')->cascadeOnDelete();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
};
