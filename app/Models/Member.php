<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'member_number',
        'initial_name',
        'group_name',
        'group_year',
        'building',
        'street',
        'village',
        'district',
        'city',
        'province',
        'postal_code',
        'country',
        'division',
        'img_profile',
    ];

    protected $casts = [
        'img_profile' => 'array',
    ];

    public function accomplishments()
    {
        return $this->hasMany(Accomplishment::class);
    }
}