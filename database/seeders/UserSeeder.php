<?php

namespace Database\Seeders;

use App\Models\CabbageType;
use App\Models\CabbageUser;
use App\Models\User;
use App\Models\Cabbage;
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
    $user = User::create([
      'name' => 'admin',
      'username' => 'cabbage_admin',
      'email' => 'admin@cabbage.directory',
      'password' => Hash::make('admin'),
    ]);

    $connection = User::create([
      'name' => 'connection',
      'username' => 'friend_of_admin',
      'email' => env('TEST_USER_EMAIL'),
      'password' => Hash::make('connection'),
    ]);

    Connection::create([
      'user_id' => $user->id,
      'friend_id' => $connection->id
    ]);

    $cabbage = Cabbage::create([
      'owner_id' => $user->id,
      'cabbage_type_id' => CabbageType::first()->id,
      'created_at' => now(),
      'updated_at' => now(),
    ]);

    CabbageUser::create([
      'user_id' => $cabbage->owner_id,
      'cabbage_id' => $cabbage->id,
      'amount' => 50
    ]);

    CabbageUser::create([
      'user_id' => $connection->id,
      'cabbage_id' => $cabbage->id,
      'amount' => 25
    ]);
  }
}
