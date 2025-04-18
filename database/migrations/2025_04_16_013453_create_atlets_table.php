<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAtletsTable extends Migration
{
    public function up()
    {
        Schema::create('atlets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('alamat')->nullable();
            $table->string('notelp')->nullable();
            $table->string('nik')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nias')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('asal_sekolah_instansi')->nullable();
            $table->enum('jenis_kelamin', ['putra', 'putri'])->nullable();
            $table->foreignId('pengkabpengkot')->constrained('users')->onDelete('cascade')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('atlets');
    }
}
