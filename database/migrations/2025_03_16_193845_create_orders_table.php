<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name'); // ФИО покупателя (обязательное)
            $table->date('order_date'); // дата создания заказа (обязательная)
            $table->enum('status', ['новый', 'выполнен'])->default('новый');
            $table->text('comment')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->unsignedInteger('quantity')->default(1); // количество товара
            $table->timestamps();

            $table->foreign('product_id')
                ->references('id')->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
