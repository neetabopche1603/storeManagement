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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile')->unique();
            $table->string('image')->nullable();

            // $table->foreign('manager_store_id')
            // ->references('id')->on('stores')->onDelete('cascade');
            // $table->foreign('sales_store_id')
            // ->references('id')->on('stores')->onDelete('cascade');

            $table->unsignedBigInteger('manager_store_id')->nullable();
            $table->unsignedBigInteger('sales_store_id')->nullable();
            $table->tinyInteger('role')->comment("1= Admin,2=Store,3=Sale-Person");
            $table->tinyInteger('status')->comment("1=Active, 2= Dective")->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();


            // $table->foreign('manager_store_id')->references('id')->on('stores')->onUpdate('no action')->onDelete('cascade');
            // $table->foreign('sales_store_id')->references('id')->on('stores')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
