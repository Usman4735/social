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
           $table->text('picture')->nullable();
           $table->integer('pre_moderation')->default(0);
           $table->integer('added_by')->nullable();
           $table->integer('added_by_role')->nullable();
           $table->text('category_description', 200)->nullable();
           $table->text('seo_url')->nullable();
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
        Schema::dropIfExists('product_categories');
    }
};
