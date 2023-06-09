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
        Schema::create('ve', function (Blueprint $table) {
            $table->id();
            $table->string("tennguoidi");
            $table->foreignId('idchuyenbay')->constrained('chuyenbay')->onUpdate('cascade')
                ->onDelete('cascade');
            $table->date("ngaydatve");
            $table->integer("trangthai");
            $table -> float("gia");
            $table -> integer("loaive");
            $table->string("vitringoi", 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ve');
    }
};
