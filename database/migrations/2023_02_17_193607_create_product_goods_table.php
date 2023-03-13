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
        Schema::create('product_goods', function (Blueprint $table) {
            $table->id();
            $table->string("name", 200);
            $table->text("description");
            $table->foreignId('group_id')->constrained('product_groups');
            $table->bigInteger('admin_id')->nullable();
            $table->bigInteger('manager_id')->nullable();
            $table->string("status");
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
        Schema::dropIfExists('product_goods');
    }
};
