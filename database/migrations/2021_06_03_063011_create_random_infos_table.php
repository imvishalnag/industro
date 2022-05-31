<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRandomInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('random_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name',256)->nullable();
            $table->string('phone',256)->nullable();
            $table->date('date')->nullable();
            $table->longText('about')->nullable();
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
        Schema::dropIfExists('random_infos');
    }
}
