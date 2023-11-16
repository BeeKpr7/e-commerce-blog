<?php

use App\Enums\OrderStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('adress_id')->constrained();
            $table->foreignId('user_id')->nullable()->constrained()->default(null);
            $table->foreignId('coupon_id')->nullable()->constrained()->default(null);
            $table->foreignId('payment_id')->nullable()->constrained()->default(null);
            $table->integer('total');
            $table->string('status')->default(OrderStatus::PENDING->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
