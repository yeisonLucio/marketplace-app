<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Src\Orders\Domain\Enums\PaymentMethod;
use Src\Orders\Domain\Enums\PaymentStatus;

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
            $table->string('customer_name', 80);
            $table->string('customer_email', 120);
            $table->string('customer_mobile', 40);
            $table->string('product_reference', 50);
            $table->string('product_description', 150);
            $table->string('total', 50);
            $table->string('process_url', 100)->nullable();
            $table->string('request_id', 50)->nullable();
            $table->enum('status', array_column(PaymentStatus::cases(), 'value'));
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
        Schema::dropIfExists('orders');
    }
};
