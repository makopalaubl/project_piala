<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        Member::create([
            'full_name'     => 'Tama Putra',
            'member_number' => 'MBR001',
            'initial_name'  => 'TP',
            'group_name'    => 'Tim A',
            'group_year'    => '2022',
            'building'      => 'Gedung A',
            'street'        => 'Jl. Merdeka No.1',
            'village'       => 'Desa Damai',
            'district'      => 'Kec. Sejahtera',
            'city'          => 'Bandung',
            'province'      => 'Jawa Barat',
            'postal_code'   => '40123',
            'country'       => 'Indonesia',
            'division'      => 'Atletik',
            'img_profile'   => json_encode(['url' => 'profile/mbr001.jpg']),
        ]);
    }
}
