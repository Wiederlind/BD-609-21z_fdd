<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Subject extends Model
{
    use HasFactory;

    public function tutors(): HasMany
    {
        return $this->hasMany(Tutor::class);
    }

    protected $fillable = [
        'subject_name',
    ];
}
