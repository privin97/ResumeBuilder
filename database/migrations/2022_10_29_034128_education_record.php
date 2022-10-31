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
        Schema::create('education_record', function(Blueprint $table){
            $table->increments('id');
            $table->string('session_token');
            $table->string('course_of_education');
            $table->string('place_of_education');
            $table->date('start_of_education');
            $table->date('end_of_education');
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
        //
    }
};
