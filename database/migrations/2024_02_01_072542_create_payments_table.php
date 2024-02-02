<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_invoice_id');
            $table->string('stripe_payment_intent');
            $table->string('stripe_payment_method');
            $table->string('amount');
            $table->string('discount_amount')->nullable();
            $table->string('discount_coupon')->nulllable();
            $table->string('payment_type');
            $table->string('payment_status');
            $table->integer('subscription_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
