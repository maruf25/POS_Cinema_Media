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
        Schema::create('transactions', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->unsignedBigInteger('user_id')->index('fk_transactions_users1_idx');
            $table->integer('timetable_id')->index('fk_transaction_timetable1_idx');
            $table->string('invoice_code', 20)->unique('invoice_UNIQUE');
            $table->dateTime('date');
            $table->integer('quantity');
            $table->float('unit_price', 10, 0);
            $table->integer('cash')->nullable();
            $table->integer('return')->nullable();
            $table->float('total', 10, 0);
            $table->enum('payment_method', ['CASH', 'QRIS']);

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('timetable_id')->references('id')->on('timetables')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
