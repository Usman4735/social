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
            $table->text("order_no");
            $table->foreignId('customer_id')->constrained('customers');
            $table->foreignId('group_id')->constrained('product_groups');
            $table->foreignId('good_id')->constrained('product_goods');
            $table->foreignId('category_id')->constrained('product_categories');
            $table->double("price")->nullable();
            $table->integer("qty")->nullable();
            $table->string("payment_method", 50)->nullable();
            $table->text("payment_id", 50)->nullable();
            $table->integer("status")->default(1);
            $table->timestamps();
            $table->softDeletes();

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
