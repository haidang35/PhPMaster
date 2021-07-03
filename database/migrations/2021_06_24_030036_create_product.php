<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments("product_id");
            $table->string("product_name");
            $table->string("product_image");
            $table->decimal("product_price", 12, 4);
            $table->integer("product_quantity", );
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("brand_id");
            $table->string("product_desc");
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
        Schema::dropIfExists('products');
    }
}
