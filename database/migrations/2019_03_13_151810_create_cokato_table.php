<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCokatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cokatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('role');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('photo')->default('default.jpg')->nullable();
            $table->boolean('active');
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
        Schema::dropIfExists('cokato');
    }
}
