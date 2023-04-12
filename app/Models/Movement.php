<?php

namespace App\Models;

use App\Enum\RecurrenceEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movement extends Model
{
    use HasFactory;

    protected $table = 'movements';

    protected $fillable = [
        'value',
        'description',
        'created_by',
        'recurrence',
    ];

    protected $casts = [
        'recurrence' => RecurrenceEnum::class,
    ];
}
