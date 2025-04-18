<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNomorPerlombaanTable extends Migration
{
    public function up()
    {
        Schema::create('nomor_perlombaan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_id')->constrained()->onDelete('cascade');
            $table->string('noperlombaan')->unique();
            $table->string('kelompokumur');
            $table->enum('kelompok', ['putra', 'putri']);
            $table->string('nomor_acara');
            $table->dateTime('waktu_pelaksanaan');
            $table->enum('jenislomba', ['perorangan', 'estafet']);
            $table->decimal('biaya_pendaftaran', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('nomor_perlombaan');
    }
}
