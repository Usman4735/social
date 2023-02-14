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
        Schema::create('product_categories', function (Blueprint $table) {
           $table->id();
           $table->string('name', 100)->nullable();
           $table->string('parent_category', 100)->nullable();
           $table->string('picture')->nullable();
           $table->string('added_by')->nullable();
           $table->string('added_by_role')->nullable();
           $table->string('category_description')->nullable();
           $table->string('seo_url')->nullable();
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
        Schema::dropIfExists('product_categories');
    }
};
