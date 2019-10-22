<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_metas', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('key');
            $table->longText('value');
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
        Schema::dropIfExists('invoice_metas');
    }
}
