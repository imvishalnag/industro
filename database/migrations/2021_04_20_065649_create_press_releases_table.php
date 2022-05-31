<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePressReleasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('press_releases', function (Blueprint $table) {
            $table->id();
            $table->string('title',256)->nullable();
            $table->string('image',256)->nullable();
            $table->string('short_desc',256)->nullable();
            $table->string('long_desc',256)->nullable();
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
        Schema::dropIfExists('press_releases');
    }
}
