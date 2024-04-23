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
        if(!Schema::hasTable('alunos')){
            Schema::create('alunos', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('RA')->unique();
                //$table->foreignId('curso_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alunos');
    }
};
