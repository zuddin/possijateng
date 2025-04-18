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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('atlets_id');
            $table->string('invoice');
            $table->decimal('total', 8, 2);
            $table->enum('status', ['pending', 'success', 'expired', 'failed'])->default('pending');
            $table->timestamps();
    
            $table->foreign('atlets_id')->references('id')->on('atlets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
