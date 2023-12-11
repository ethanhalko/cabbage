<?php

namespace App\Models;

use App\Http\Requests\CabbageUserRequest;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class CabbageUser extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cabbage(): BelongsTo
    {
        return $this->belongsTo(Cabbage::class, 'cabbage_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
