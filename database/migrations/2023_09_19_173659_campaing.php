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
        Schema::create('campaing', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('codigo')->nullable();
            $table->enum('estado', ['0', '1','2'])->default(1);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaing');
    }
};
