<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomplishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'year',
        'month',
        'day',
        'event_name',
        'level',
        'class',
        'organizer',
        'athlete',
        'rank',
        'awards',
        'condition',
        'notes',
    ];

    protected $casts = [
        'awards' => 'array',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}