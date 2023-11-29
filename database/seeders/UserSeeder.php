<?php

namespace Database\Seeders;

use App\Models\Cabbage;
use App\Models\User;
use App\Models\UserCabbage;
use App\Models\Connection;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $cabbage = Cabbage::first();
    $user = User::create([
      'name' => 'admin',
      'email' => 'admin@cabbage.directory',
      'password' => Hash::make('admin'),
    ]);

    $connection = User::create([
      'name' => 'connection',
      'email' => 'connection@cabbage.directory',
      'password' => Hash::make('connection'),
    ]);

    UserCabbage::create([
      'user_id' => $user->id,
      'cabbage_id' => $cabbage->id,
      'amount' => '50',
      'created_at' => now(),
      'updated_at' => now(),
    ]);

    UserCabbage::create([
      'user_id' => $connection->id,
      'cabbage_id' => $cabbage->id,
      'amount' => '50',
      'created_at' => now(),
      'updated_at' => now(),
    ]);

    Connection::create([
      'user_id' => $user->id,
      'friend_id' => $connection->id
    ]);
  }
}
