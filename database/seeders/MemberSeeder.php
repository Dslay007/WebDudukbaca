<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run()
    {
        // Add a few dummy members
        $members = [
            [
                'member_id' => '001',
                'member_name' => 'John Doe',
                'mpasswd' => hash('sha256', 'password'), // SHA256
            ],
            [
                'member_id' => '002',
                'member_name' => 'Jane Smith',
                'mpasswd' => md5('password'), // MD5
            ],
            [
                'member_id' => '003',
                'member_name' => 'Laravel User',
                'mpasswd' => hash('sha256', 'password'), // SHA256
            ],
        ];

        foreach ($members as $data) {
            Member::updateOrCreate(
                ['member_id' => $data['member_id']],
                array_merge($data, [
                    'gender' => '1',
                    'member_type_id' => '1',
                ])
            );
        }
        
        $this->command->info('Dummy members seeded. Password is "password"');
    }
}
