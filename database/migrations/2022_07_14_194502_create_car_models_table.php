<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->string('car_model');
            $table->string('year');
            $table->string('run');
            $table->foreignId('mark_id')
                ->cascadeOnUpdate()
                ->constrained();
            $table->foreignId('generation_id')
                ->cascadeOnUpdate()
                ->nullable()
                ->constrained();
            $table->foreignId('color_id')
                ->cascadeOnUpdate()
                ->constrained();
            $table->foreignId('body_type_id')
                ->cascadeOnUpdate()
                ->constrained();
            $table->foreignId('engine_type_id')
                ->cascadeOnUpdate()
                ->constrained();
            $table->foreignId('gear_type_id')
                ->cascadeOnUpdate()
                ->constrained();
            $table->foreignId('transmission_id')
                ->cascadeOnUpdate()
                ->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_models');
    }
}
