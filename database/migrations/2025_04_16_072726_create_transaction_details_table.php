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
            Schema::create('transaction_details', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('transaction_id');
                $table->unsignedBigInteger('nomor_perlombaan_id');
                $table->integer('catatan_waktu')->nullable();
                $table->integer('biaya_pendaftaran');
                $table->timestamps();

                $table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');
                $table->foreign('nomor_perlombaan_id')->references('id')->on('nomor_perlombaan')->onDelete('cascade');
            });

        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_details');
    }
};
