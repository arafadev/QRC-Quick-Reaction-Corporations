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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->text('details')->nullable();
            $table->text('map_desc')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->double('avg_rate')->nullable();
            $table->integer('rate_count')->nullable();
            $table->double('delivery_price')->nullable();
            $table->string('image');
            $table->boolean('status')->default(1);
            $table->string('password');
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
        Schema::dropIfExists('providers');
    }
};
