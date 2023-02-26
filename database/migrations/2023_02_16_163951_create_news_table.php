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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->text("title")->nullable();
            $table->text("short_description")->nullable();
            $table->text("long_description")->nullable();
            $table->text("image")->nullable();
            $table->text('seo_url')->unique();
            $table->text('seo_description')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_h1')->nullable();
            $table->integer("is_published")->default(1);
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
        Schema::dropIfExists('news');
    }
};
