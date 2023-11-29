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
        // This requires two entries for each connection which violates DKNF but is more performant
        // See https://explainextended.com/2009/03/07/selecting-friends/
        Schema::create('connections', function (Blueprint $table) {
            $table->uuid('user_id');
            $table->uuid('friend_id');
            $table->primary(['user_id', 'friend_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('friend_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('connections');
    }
};
