<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('name',256)->nullable();
            $table->string('degree',256)->nullable();
            $table->string('experience',256)->nullable();
            $table->string('photo',256)->nullable();
            $table->double('consultation_fee',10,2)->nullable();
            $table->longText('location')->nullable();
            $table->longText('doctor_bio')->nullable();
            $table->longText('cktwo')->nullable();
            $table->char('has_consultaion_fee',1)->comment('1=No,2=Yes')->default(1);
            $table->char('has_location',1)->comment('1=No,2=Yes')->default(1);
            $table->char('has_review',1)->comment('1=No,2=Yes')->default(1);
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
        Schema::dropIfExists('doctors');
    }
}
