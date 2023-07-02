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
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->String('namapegawai');
            $table->integer('role_id');
            // $table->integer('role_id')->default('2'); //  1 == pegawai, 2 == manajemen
            $table->string('phonepegawai')->nullable();
            // $table->enum('statuspegawai',['aktif','tidakaktif']);
            $table->string('statuspegawai')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawais');
    }
};