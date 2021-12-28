<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->date('bill_date');
            $table->integer('payment_id');
            $table->double('sum_amount', 8, 2);
            $table->double('Gst_Total', 8, 2);
            $table->double('Paid_amount', 8, 2);
            $table->double('Due_Total', 8, 2);
            $table->double('totel_amount', 8, 2);
            $table->enum('Payment_type', ['cheque', 'cash', 'credit_card']);
            $table->enum('Payment_status', ['Full_Payment', 'Advance_Payment', 'No_Payment']);
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
        Schema::dropIfExists('sell');
    }
}
