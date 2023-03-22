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
        Schema::create('chuyenbay', function (Blueprint $table) {
            $table->id();
            $table->foreignId('idmaybay')->constrained('maybay')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('sanbaydi')->constrained('sanbay')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('sanbayden')->constrained('sanbay')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->dateTime("tgiankhoihanh");
            $table->dateTime("tgiandendukien");
            $table -> string("quangduong",255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chuyenbay');
    }
};
