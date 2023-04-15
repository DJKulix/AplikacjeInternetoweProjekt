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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userID');
            $table->string('name', 200);
            $table->unsignedTinyInteger('status')->default(0);
            $table->timestamps();
            $table->date('startDate');
            $table->date('endDate');
            $table->double('hourCount');
            $table->foreign('userID')->references('id')->on('users');
            $table->double('price', unsigned: true);
            $table->double('paidPrice', unsigned: true);
            $table->string('description', 200)->default(null)->nullable();
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
