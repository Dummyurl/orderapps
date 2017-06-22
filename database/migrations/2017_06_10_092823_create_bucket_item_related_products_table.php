<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBucketItemRelatedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bucket_item_related_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('buk_itm_id')->unsigned();
            $table->foreign('buk_itm_id')->references('id')->on('bucket_items')->onDelete('cascade')->onUpdate('cascade');
            $table->string('optional_item_name');
            $table->string('optional_item_price')->nullable();
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
        Schema::dropIfExists('bucket_item_related_products');
    }
}
