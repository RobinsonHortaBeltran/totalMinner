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
        Schema::create('UserPayments', function (Blueprint $table) {
            $table->id();
            $table->string('id_user')->nullable();
            $table->string('monto')->unique();
            $table->string('codigoCamp')->nullable();
            $table->timestamp('img')->nullable();
            $table->enum('estado', ['0', '1'])->default('0');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('UserPayments');
    }
};
