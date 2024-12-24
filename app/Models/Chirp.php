<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Chirp extends Model
{
    protected $fillable = [
        'message',
        'media'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
