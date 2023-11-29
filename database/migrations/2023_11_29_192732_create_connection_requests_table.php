<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('connection_requests', function (Blueprint $table) {
      $table->id();
      $table->uuid('from');
      $table->uuid('to');
      $table->foreign('from')->references('id')->on('users')->onDelete('cascade');
      $table->foreign('to')->references('id')->on('users')->onDelete('cascade');
      $table->timestamp('accepted_at')->nullable();
      $table->timestamps();
      $table->softDeletes();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('connection_requests');
  }
};
