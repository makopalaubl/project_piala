<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Accomplishment;
use App\Models\Member;

class AccomplishmentSeeder extends Seeder
{
    public function run(): void
    {
        $member = Member::first(); // ambil satu member dulu

        Accomplishment::create([
            'member_id'     => $member->id,
            'start_date'     => '2024-01-15',
            'end_date'      => '2024-01-17',
            'category'      => 'Olahraga',
            'event_name'    => 'Kejuaraan Nasional Atletik',
            'type'          => 'Lomba',
            'level'         => 'Nasional',
            'organizer'     => 'Kemenpora RI',
            'barcode_trophy'=> 'BC123456789',
            'street'        => 'Jl. Sudirman',
            'province'      => 'DKI Jakarta',
            'zip_code'      => '10210',
            'country'       => 'Indonesia',
            'rank'          => '1',
            'awards'        => json_encode(['type' => 'Medal', 'id' => 'MD123']),
            'condition'     => 'Sehat',
            'notes'         => 'Lomba berjalan lancar dan meraih emas.',
        ]);
    }
}
