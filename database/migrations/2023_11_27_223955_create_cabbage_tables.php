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
        Schema::create('cabbage_types', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique();
            $table->timestamps();
        });

        Schema::create('cabbages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cabbage_type_id');
            $table->uuid('owner_id');
            $table->timestamps();
            $table->foreign('cabbage_type_id')->references('id')->on('cabbage_types');
            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabbage_types');
        Schema::dropIfExists('cabbages');
    }
};
