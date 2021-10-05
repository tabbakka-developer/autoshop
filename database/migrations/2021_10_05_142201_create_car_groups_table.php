<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_formatted');
            $table->string('alias');
            $table->unsignedBigInteger('car_maker_id');
            $table->foreign('car_maker_id')
                ->references('id')
                ->on('car_makers');
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
        Schema::dropIfExists('car_groups');
    }
}
