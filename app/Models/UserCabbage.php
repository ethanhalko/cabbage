<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserCabbage extends Model
{
  use HasFactory;

  protected $fillable = [
    'user_id',
    'cabbage_id',
    'amount'
  ];

  public function Cabbage()
  {
    return $this->belongsTo(Cabbage::class);
  }

  public function Users()
  {
    return $this->belongsToMany(User::class, 'user_cabbages', 'id', 'user_id');
  }
}
