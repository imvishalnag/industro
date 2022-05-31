<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cat_id');
            $table->bigInteger('sub_cat_id');
            $table->string('banner_headline',256)->nullable();
            $table->string('banner_phone',256)->nullable();
            $table->longText('banner_description')->nullable();
            $table->string('banner_image',256)->nullable();
            $table->string('usp_image_one',256)->nullable();
            $table->string('usp_text_one',256)->nullable();
            $table->string('usp_image_two',256)->nullable();
            $table->string('usp_text_two',256)->nullable();
            $table->string('usp_image_three',256)->nullable();
            $table->string('usp_text_three',256)->nullable();
            $table->string('usp_image_four',256)->nullable();
            $table->string('usp_text_four',256)->nullable();
            $table->longText('surgery_description')->nullable();
            $table->string('treatment_image',256)->nullable();
            $table->longText('treatment_description')->nullable();
            $table->string('total_patients',256)->nullable();
            $table->string('total_cities',256)->nullable();
            $table->string('total_clinincs',256)->nullable();
            $table->string('total_surgeries',256)->nullable();
            $table->string('total_doctors',256)->nullable();
            $table->string('total_hospitals',256)->nullable();
            $table->string('about_surgery',256)->nullable();
            $table->string('video_title',256)->nullable();
            $table->string('video_id',256)->nullable();
            $table->string('video_image',256)->nullable();
            $table->char('is_published',1)->comment('1=Yes,2=No')->default(1);
            $table->char('banner_status',1)->comment('1=yes,2=No')->default(2);
            $table->char('usp_status',1)->comment('1=yes,2=No')->default(2);
            $table->char('surgery_status',1)->comment('1=yes,2=No')->default(2);
            $table->char('overview_status',1)->comment('1=yes,2=No')->default(2);
            $table->char('causes_status',1)->comment('1=yes,2=No')->default(2);
            $table->char('symptomp_status',1)->comment('1=yes,2=No')->default(2);
            $table->char('treatment_status',1)->comment('1=yes,2=No')->default(2);
            $table->char('number_status',1)->comment('1=yes,2=No')->default(2);
            $table->char('faq_status',1)->comment('1=yes,2=No')->default(2);
            $table->char('read_more_status',1)->comment('1=yes,2=No')->default(2);
            $table->char('video_status',1)->comment('1=yes,2=No')->default(2);
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
        Schema::dropIfExists('pages');
    }
}
