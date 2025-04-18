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
        Schema::table('nomor_perlombaan', function (Blueprint $table) {
            $table->string('slug')->unique()->after('id');
        });
    }
    
    public function down()
    {
        Schema::table('nomor_perlombaan', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
