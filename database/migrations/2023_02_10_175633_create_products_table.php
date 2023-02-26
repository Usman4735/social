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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->text('tags')->nullable();
            $table->text('picture')->nullable();
            $table->double('price')->nullable();
            $table->text('currency_code')->nullable();
            $table->text('manager_commission')->nullable();
            $table->text('manager_commission_type')->nullable();
            $table->text('description')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_h1')->nullable();
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
};
