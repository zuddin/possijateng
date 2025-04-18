<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nik')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nias')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('asal_sekolah_instansi')->nullable();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['nik', 'nama_ibu', 'nama_ayah', 'nias', 'tanggal_lahir', 'asal_sekolah_instansi', 'jenis_kelamin']);
        });
    }
};
