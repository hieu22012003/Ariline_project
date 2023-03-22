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
        Schema::create('cskh', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idkh')->constrained('khachhang')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer("sdt");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cskh');
    }
};
