<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialityUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speciality_user', function (Blueprint $table) {
            $table->Increments('id');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('speciality_id');
            $table->foreign('speciality_id')->references('id')
            ->on('specialities')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('speciality_user');
    }
}
