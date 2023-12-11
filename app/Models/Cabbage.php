<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Log;

class Cabbage extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cabbage_id',
        'cabbage_type_id',
        'created_by'
    ];

    public function owner(): HasOne
    {
        return $this->hasOne(CabbageUser::class);
    }

    public function cabbageType(): BelongsTo
    {
        return $this->belongsTo(CabbageType::class);
    }

    public function cabbageUsers(): HasMany
    {
        return $this->hasMany(CabbageUser::class);
    }

    public static function formatCabbagesForDashboard($cabbages)
    {
        return $cabbages?->map(function ($cabbage) {
            $data = [
                'id' => $cabbage->id,
                'amount' => $cabbage->owner?->amount,
                'type' => $cabbage->cabbageType?->type,
                'cabbage_users' => $cabbage->cabbageUsers,
                'created_at' => $cabbage->created_at,
                'updated_at' => $cabbage->updated_at,
            ];

            return $data;
        });
    }
}
