<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('email');
            $table->string('phone_no');
            $table->string('intruction')->nullable();
            $table->string('discount_code')->nullable();
            $table->boolean('delivery');
            $table->boolean('collection');
            $table->string('delivery_post_code')->nullable();
            $table->string('address_line1')->nullable();
            $table->string('address_line2')->nullable();
            $table->string('city')->nullable();
            $table->string('request_delivery_time')->nullable();
            $table->text('product_detail');
            $table->string('discount')->nullable();
            $table->string('delivery_charge')->nullable();
            $table->string('transacation_fee')->nullable();
            $table->string('total');
            $table->string('status')->default('pending');
            $table->string('transcation_id');
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
        Schema::dropIfExists('order');
    }
}
