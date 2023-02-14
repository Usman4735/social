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
            $table->string('tags')->nullable();
            $table->string('image')->nullable();
            $table->double('price')->nullable();
            $table->double('manager_salary')->nullable();
            $table->string('manager_salary_type')->nullable();
            $table->text('description')->nullable();
            $table->string('seo_url')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('seo_keyword')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_h1')->nullable();
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
