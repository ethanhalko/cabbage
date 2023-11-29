<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\CreatesApplication;
use Tests\TestCase;

class UserModelTest extends TestCase
{
  use CreatesApplication, RefreshDatabase;

  protected $seed = true;

  public function test_it_retrieves_cabbages(): void
  {
    $this->seed();

    $cabbages = User::first()->cabbages;

    $this->assertNotEmpty($cabbages);
  }

  public function test_it_retrieves_connections(): void
  {
    $this->seed();

    $connections = User::first()->connections;

    $this->assertNotEmpty($connections);
  }
}
