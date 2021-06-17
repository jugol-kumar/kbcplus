<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('vendor_id')->nullable();

            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            
            
            $table->string('images')->nullable();
            $table->float('sell_price')->nullable();
            $table->float('purchase_price')->nullable();
            $table->float('product_tax')->nullable();
            $table->tinyInteger('tax_type')->default(1);
            $table->float('product_discount')->nullable();
            $table->tinyInteger('discount_type')->default(1);
            $table->string('product_unit')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('full_description')->nullable();
            $table->tinyInteger('publication_status')->default(0);
            $table->tinyInteger('featured_status')->default(0);
            $table->tinyInteger('deletion_status')->default(0);
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
