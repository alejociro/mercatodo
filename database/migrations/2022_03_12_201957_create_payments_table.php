<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('reference',40)->unique();
            $table->string('receipt')->nullable();
            $table->string('payer_document')->nullable();
            $table->string('payer_ip')->nullable();
            $table->string('description')->nullable();
            $table->unsignedInteger('amount')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('paid_at')->nullable();
            $table->string('process_url',255)->nullable();
            $table->string('request_id', 255)->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->unsignedBigInteger('shopping_cart_id');
            $table->foreign('shopping_cart_id')
                ->references('id')
                ->on('shopping_carts');
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
        Schema::dropIfExists('payments');
    }
}
