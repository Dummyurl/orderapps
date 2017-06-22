<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBucketItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bucket_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buk_id')->unsigned();
            $table->foreign('buk_id')->references('id')->on('bucket_product')->onDelete('cascade')->onUpdate('cascade');
            $table->string('item_name');
            $table->integer('item_qty');
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
        Schema::dropIfExists('bucket_items');
    }
}
