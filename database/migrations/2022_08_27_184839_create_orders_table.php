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
            $table->id();
            $table->string('order_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('sale_per_id');
            $table->string('user_mobile');
            $table->tinyInteger('payment_online')->comment("1=Cash,2=Online")->default(1);
            $table->unsignedBigInteger('product_id');
            $table->integer('qty');
            $table->float('total_price');
            $table->string('transaction_id');
            $table->boolean('status')->comment("1=Success, 0=Faild");

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
