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
        Schema::create('product_group_permissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_group_id');
            $table->bigInteger('manager_id');
            $table->integer('see_price')->nullable();
            $table->integer('edit_price')->nullable();
            $table->integer('see_photos')->nullable();
            $table->integer('edit_photos')->nullable();
            $table->integer('see_description')->nullable();
            $table->integer('edit_description')->nullable();
            $table->integer('see_tags')->nullable();
            $table->integer('edit_tags')->nullable();
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
        Schema::dropIfExists('product_group_permissions');
    }
};
