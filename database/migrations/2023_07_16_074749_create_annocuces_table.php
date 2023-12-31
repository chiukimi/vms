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
        Schema::create('annocuces', function (Blueprint $table) {
            $table->id()->auto_increment();
            $table->string('aunthor');
            $table->string('title');
            $table->string('banner');
            $table->longText('content');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annocuces');
    }
};
