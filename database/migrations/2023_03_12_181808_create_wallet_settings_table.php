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
        Schema::create('wallet_settings', function (Blueprint $table) {
            $table->id();
            $table->text("name")->nullable();
            $table->text("type")->nullable();
            $table->text("api_key")->nullable();
            $table->text("secret_key")->nullable();
            $table->text("wallet_address")->nullable();
            $table->text("network")->nullable();
            $table->integer("status")->nullable();
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
        Schema::dropIfExists('wallet_settings');
    }
};
