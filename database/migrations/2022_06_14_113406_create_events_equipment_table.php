<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('eventEquipment', function (Blueprint $table) {
            $table->unsignedBigInteger('eventID');
            $table->unsignedBigInteger('equipmentID');
            $table->integer('quantity', unsigned: true);

            $table->timestamps();
            $table->foreign('eventID')->references('id')->on('events');
            $table->foreign('equipmentID')->references('id')->on('equipments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
