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
        Schema::create('product_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('category_id')->nullable();
            $table->text('tags')->nullable();
            $table->text('image')->nullable();
            $table->double('price')->nullable();
            $table->double('manager_salary')->nullable();
            $table->text('manager_salary_type')->nullable();
            $table->text('description')->nullable();
            $table->text('seo_url')->nullable();
            $table->text('seo_description')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_h1')->nullable();
            $table->bigInteger('added_by')->nullable();
            $table->integer('added_by_role')->nullable();
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
        Schema::dropIfExists('product_groups');
    }
};
