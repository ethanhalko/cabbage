<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Log;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CabbageSeeder extends Seeder
{
    protected $cabbages = [
      'Red',
      'Green',
      'Savoy',
      'Napa',
      'White'
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      collect($this->cabbages)->each(function ($cabbage) {
          \App\Models\Cabbage::create( [
            'type' => $cabbage,
            'created_at' => now(),
            'updated_at' => now(),
          ]);
      });
    }
}
