<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accomplishment;
use App\Models\Member;

class AccomplishmentSeeder extends Seeder
{
    public function run(): void
    {
        $member = Member::first(); // Ambil satu member untuk relasi

        Accomplishment::create([
            'member_id'    => $member->id,
            'year'         => 2024,
            'month'        => 'Mei',
            'day'          => 12,
            'event_name'   => 'Lomba Lari Gunung Nasional',
            'level'        => 'Nasional',
            'class'        => 'Putra Umum',
            'organizer'    => 'KONI Indonesia',
            'athlete'      => 'Rizky Fadilah',
            'rank'         => 'Juara 1',
            'awards'       => json_encode([
                'type' => 'Medal',
                'id'   => 'MED123456'
            ]),
            'condition'    => 'Sehat',
            'notes'        => 'Performa sangat baik di cuaca ekstrem.',
        ]);
    }
}