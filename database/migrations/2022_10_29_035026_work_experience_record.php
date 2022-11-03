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
        Schema::create('work_experience_record', function(Blueprint $table){
            $table->increments('id');
            $table->string('session_token');
            $table->string('name_of_employer');
            $table->string('position_of_job');
            $table->date('start_of_employer');
            $table->date('end_of_employer')->nullable();;
            $table->string('present')->nullable();;
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
