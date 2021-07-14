<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
//            $table->foreignId('shipping_id')->constrained('addresses')->onDelete('cascade');
            $table->foreignId('shipping_id')->nullable();
            $table->foreignId('payment_id')->nullable();
            $table->float('total')->nullable();
            $table->string('received_date')->nullable();
            $table->string('received_time')->nullable();
            $table->enum('order_status', ['pending','conformed','processing','picked','shipped','delivered'])->default('pending');
            $table->date('date');
            $table->tinyInteger('deletion_status')->default(1);
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
}
