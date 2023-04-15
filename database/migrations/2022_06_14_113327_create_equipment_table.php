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
        Schema::create('equipments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type');
            $table->string('name', 50);
            $table->double('price');
            $table->integer('quantity', unsigned: true);
            $table->string('imagePath', 50)->default(null)->nullable();
            $table->string('imagePath2', 50)->default(null)->nullable();
            $table->string('videoPath')->default(null)->nullable();
            $table->string('description', 500);

            $table->string('info1', 200)->default(null)->nullable();
            $table->string('info2', 200)->default(null)->nullable();
            $table->string('info3', 200)->default(null)->nullable();
            $table->string('info4', 200)->default(null)->nullable();
            $table->string('info5', 200)->default(null)->nullable();

            $table->string('feature1', 200)->nullable();
            $table->string('feature2', 200)->nullable();
            $table->string('feature3', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equpiments');
    }
};
