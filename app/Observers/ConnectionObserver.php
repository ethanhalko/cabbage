<?php

namespace App\Observers;

use App\Models\Connection;

class ConnectionObserver
{
  /**
   * Handle the User "created" event.
   */
  public function created(Connection $connection): void
  {
    Connection::insert([
      'user_id' => $connection->friend_id,
      'friend_id' => $connection->user_id,
      'created_at' => now(),
      'updated_at' => now()
    ]);
  }
}
