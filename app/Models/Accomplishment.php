<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accomplishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id',
        'start_date',
        'end_date',
        'category',
        'event_name',
        'type',
        'level',
        'organizer',
        'barcode_trophy',
        'street',
        'province',
        'zip_code',
        'country',
        'rank',
        'awards',
        'condition',
        'notes',
    ];

    protected $casts = [
        'awards' => 'array',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
