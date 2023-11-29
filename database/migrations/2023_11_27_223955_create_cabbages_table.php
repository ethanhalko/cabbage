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
        Schema::create('cabbages', function (Blueprint $table) {
            $table->id();
            $table->string('type')->unique();
            $table->timestamps();
        });

        Schema::create('user_cabbages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cabbage_id');
            $table->uuid('user_id');
            $table->integer('amount');
            $table->timestamps();
            $table->foreign('cabbage_id')->references('id')->on('cabbages');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cabbages');
        Schema::dropIfExists('cabbage_users');
    }
};
