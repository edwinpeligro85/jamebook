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
            $table->foreignId('user_id')
                ->nullable()
                ->constrained();

            $table->integer('sub_total')->unsigned()->default(0);
            $table->integer('delivery_total')->unsigned()->default(0);
            $table->integer('discount_total')->unsigned()->default(0);
            $table->integer('tax_total')->unsigned()->default(0);
            $table->integer('order_total')->unsigned()->default(0);

            $table->string('shipping_method')->nullable();
            $table->string('payment_method')->nullable();

            $table->string('tracking_no')->nullable()->index();
            $table->string('reference')->nullable()->unique();
            $table->text('notes')->nullable();

            $table->string('shipping_phone')->nullable();
            $table->string('shipping_firstname')->nullable();
            $table->string('shipping_lastname')->nullable();
            $table->string('shipping_address')->nullable();
            $table->string('shipping_city')->nullable();
            $table->string('shipping_state')->nullable();
            $table->string('shipping_country')->nullable();

            $table->dateTime('paid_at')->nullable();
            $table->dateTime('canceld_at')->nullable();
            $table->dateTime('reserved_at')->nullable();
            $table->dateTime('delivered_at')->nullable();

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
};
