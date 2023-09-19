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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('codigo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nombreCompleto')->nullable();
            $table->string('apellidos')->nullable();
            $table->string('direccion')->nullable();
            $table->string('pais')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('pwd')->nullable();
            $table->string('telefono')->nullable();
            $table->string('codigo_quien_refiere')->nullable();
            $table->string('token')->nullable();
            $table->enum('estado',['0','1'])->default(1);
            $table->enum('tipo',['1','2'])->default(2);

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
