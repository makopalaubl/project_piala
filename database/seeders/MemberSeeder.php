<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        Member::create([
            'full_name'     => 'Rizky Fadilah',
            'member_number' => 'MKP001',
            'initial_name'  => 'RF',
            'group_name'    => 'Alpha',
            'group_year'    => '2022',
            'building'      => 'Gedung A',
            'street'        => 'Jl. Merdeka No.10',
            'village'       => 'Cibeunying',
            'district'      => 'Bandung Wetan',
            'city'          => 'Bandung',
            'province'      => 'Jawa Barat',
            'postal_code'   => '40115',
            'country'       => 'Indonesia',
            'division'      => 'Pendakian',
            'img_profile'   => json_encode([
                'profile1.jpg', 'profile2.jpg'
            ]),
        ]);
    }
}