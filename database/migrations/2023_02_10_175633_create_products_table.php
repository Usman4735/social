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
            $table->string('name')->nullable();
            $table->foreignId('category_id')->nullable();
            $table->string('tags')->nullable();
            $table->string('picture')->nullable();
            $table->double('price')->nullable();
            $table->string('currency_code')->nullable();
            $table->string('manager_commission')->nullable();
            $table->string('manager_commission_type')->nullable();
            $table->string('description')->nullable();
            $table->string('seo_description')->nullable();
            $table->string('seo_keyword')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_h1')->nullable();
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
