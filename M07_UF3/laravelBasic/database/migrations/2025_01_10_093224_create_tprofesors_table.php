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
        Schema::create('tprofesors', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('email')->unique()->nullable(); // 'email' acepta NULL
            $table->string('password')->nullable(); // 'password' acepta NULL
            $table->string('dni')->unique()->nullable(); // 'dni' acepta NULL
            $table->integer('edad')->nullable(); // 'edad' acepta NULL
            $table->date('data_naixement')->nullable(); // 'data_naixement' acepta NULL
            $table->text('observacions')->nullable(); // 'observacions' ya está nullable
            //pot ser null
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tprofesors');
    }
};
