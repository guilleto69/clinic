<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->Increments('id');
            $table->timestamp('date');
            $table->unsignedInteger('doctor_id');
            $table->enum('status',['pending','done','cancelled'])
                ->default('pending');

            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('invoice_id');
            $table->foreign('invoice_id')->references('id')->on('invoices')
            ->onUpdated('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('appointments');
    }
}
