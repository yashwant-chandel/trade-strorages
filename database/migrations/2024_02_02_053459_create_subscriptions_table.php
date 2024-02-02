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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->integer('propertie_id');
            $table->integer('storage_id');
            $table->string('stripe_subscription_id');
            $table->string('stripe_customer_id');
            $table->string('latest_invoice_id');
            $table->string('start_on');
            $table->string('next_invoice_generate_on');
            $table->integer('user_id');
            $table->string('collection_method');     /////1.charge_automatically  2.send_invoice
            $table->string('subscription_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
