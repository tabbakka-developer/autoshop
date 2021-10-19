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
            $table->string('title');
            $table->string('title_selector')->nullable();
            $table->string('title_short')->nullable();
            $table->string('title_formatted')->nullable();
            $table->string('alias');
            $table->unsignedBigInteger('car_group_id');
            $table->foreign('car_group_id')
                ->references('id')
                ->on('car_groups');
            $table->string('constructions_from')->nullable();
            $table->string('constructions_to')->nullable();
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
