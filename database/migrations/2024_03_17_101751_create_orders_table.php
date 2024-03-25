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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->unsignedBigInteger('provider_id');
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade')->onUpdate('cascade');

            $table->string('patient_map_desc',100);
            $table->string('patient_lng' ,100)->nullable();
            $table->string('patient_lat',100 )->nullable();

            $table->string('hospital_map_desc')->nullable();
            $table->string('hospital_lng', 100)->nullable();
            $table->string('hospital_lat', 100)->nullable();

            $table->date('date');
            $table->time('time')->nullable();

            $table->text('notes')->nullable();

            $table->string('order_num', 100);

            $table->double('items_price', 10, 2)->default(0);
            $table->double('vat_value_ratio', 10, 2)->default(0);
            $table->double('vat_value', 10, 2)->default(0);
            $table->double('shipping_price', 10, 2)->default(0);
            $table->double('app_commission')->default(0);
            $table->double('total_price', 10, 4)->default(0);

            $table->enum('type', ['normal', 'abnormal']);
            $table->boolean('approved_by_provider')->default(0);
            // $table->boolean('is_settlement')->default(0);
            // $table->boolean('is_paid')->default(0);
            $table->enum('status', ['new', 'inprogress', 'finished', 'cancelled'])->default('new');
            $table->enum('cancelled_by', ['user', 'provider'])->nullable();
            $table->string('payment_method')->default('cash');

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
