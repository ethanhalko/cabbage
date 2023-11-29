<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConnectionRequest extends Model
{
  use HasFactory, SoftDeletes;

  protected $fillable = [
    'from',
    'to',
  ];

  public function accept()
  {
    $this->accepted_at = now();
    $this->save();
  }
}
