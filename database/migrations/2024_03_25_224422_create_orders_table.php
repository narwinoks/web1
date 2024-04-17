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
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('city')->nullable();
            $table->string('file')->nullable();
            $table->string('bank')->nullable();
            $table->enum('status', ['pendding', 'approve', 'complated'])->nullable()->default('pendding');
            $table->string('name_rek')->nullable();
            $table->string('price')->nullable();
            $table->string('number_order')->nullable();
            $table->string('date')->nullable();
            $table->string('transfer_to')->nullable();
            $table->longText('note')->nullable();
            $table->foreignId('product_id')->nullable();
            $table->boolean('statusenable')->nullable()->default(true);
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
        Schema::dropIfExists('orders');
    }
};
