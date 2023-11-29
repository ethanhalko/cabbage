<?php

namespace Tests\Feature;

use App\Models\Connection;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\CreatesApplication;
use Tests\TestCase;

class ConnectionModelTest extends TestCase
{
  use CreatesApplication, RefreshDatabase;

  /**
   * A basic unit test example.
   */
  public function test_it_creates_connection_pair(): void
  {
    $users = User::factory()->count(2)->create();
    $userId = $users->first()->id;
    $connectionId = $users->last()->id;

    Connection::create([
      'user_id' => $userId,
      'friend_id' => $connectionId
    ]);

    $secondConnection = Connection::where('user_id', $connectionId);

    $this->assertNotEmpty($secondConnection);
  }
}
