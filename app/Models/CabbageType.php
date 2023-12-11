<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CabbageType extends Model
{
    use HasFactory;

    public function cabbages(): HasMany
    {
        return $this->hasMany(Cabbage::class);
    }
}
