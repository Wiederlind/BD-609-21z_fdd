<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function tutor(): BelongsTo
    {
        return $this->belongsTo(Tutor::class);
    }
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    protected $fillable = [
        'user_id',
        'tutor_id',
        'subject_id',
        'lesson_date',
        'duration',
        'status',
    ];
}
