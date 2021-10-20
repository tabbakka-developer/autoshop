<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarModificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_modifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tecrmi_id')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('title');
            $table->string('title_formatted');
            $table->string('selector_title');
            $table->string('alias');
            $table->unsignedBigInteger('maker_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('model_id');
            $table->float('engine_capacity')->nullable();
            $table->timestamps();
            $table->foreign('maker_id')
                ->references('id')
                ->on('car_makers');
            $table->foreign('group_id')
                ->references('id')
                ->on('car_groups');
            $table->foreign('model_id')
                ->references('id')
                ->on('car_models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_modifications');
    }
}
