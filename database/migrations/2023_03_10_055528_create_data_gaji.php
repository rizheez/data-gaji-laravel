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
        Schema::create('data_gaji', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nik');
            $table->string('nama', 100);
            $table->string('jabatan', 50);
            $table->date('gajibulan');
            $table->unsignedInteger('telat');
            $table->unsignedInteger('nominalgaji')->nullable();
            $table->unsignedInteger('denda')->nullable();
            $table->unsignedInteger('totalgaji')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_gaji');
    }
};
