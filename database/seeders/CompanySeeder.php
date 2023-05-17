<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'company_name' => 'Company 1',
                'email' => 'company1@example.com',
                'contact' => '1234567890',
                'password' => bcrypt('password'),
                'registration_number' => 'ABC123',
                'office_location' => 'Location 1',
            ],
            [
                'company_name' => 'Company 2',
                'email' => 'company2@example.com',
                'contact' => '2345678901',
                'password' => bcrypt('password'),
                'registration_number' => 'DEF456',
                'office_location' => 'Location 2',
            ],
            [
                'company_name' => 'Company 3',
                'email' => 'company3@example.com',
                'contact' => '3456789012',
                'password' => bcrypt('password'),
                'registration_number' => 'GHI789',
                'office_location' => 'Location 3',
            ],
            [
                'company_name' => 'Company 4',
                'email' => 'company4@example.com',
                'contact' => '4567890123',
                'password' => bcrypt('password'),
                'registration_number' => 'JKL012',
                'office_location' => 'Location 4',
            ],
            [
                'company_name' => 'Company 5',
                'email' => 'company5@example.com',
                'contact' => '5678901234',
                'password' => bcrypt('password'),
                'registration_number' => 'MNO345',
                'office_location' => 'Location 5',
            ],
            [
                'company_name' => 'Company 6',
                'email' => 'company6@example.com',
                'contact' => '6789012345',
                'password' => bcrypt('password'),
                'registration_number' => 'PQR678',
                'office_location' => 'Location 6',
            ],
            [
                'company_name' => 'Company 7',
                'email' => 'company7@example.com',
                'contact' => '7890123456',
                'password' => bcrypt('password'),
                'registration_number' => 'STU901',
                'office_location' => 'Location 7',
            ],
            [
                'company_name' => 'Company 8',
                'email' => 'company8@example.com',
                'contact' => '8901234567',
                'password' => bcrypt('password'),
                'registration_number' => 'VWX234',
                'office_location' => 'Location 8',
            ],
            [
                'company_name' => 'Company 9',
                'email' => 'company9@example.com',
                'contact' => '9012345678',
                'password' => bcrypt('password'),
                'registration_number' => 'YZA567',
                'office_location' => 'Location 9',
            ],
            [
                'company_name' => 'Company 10',
                'email' => 'company10@example.com',
                'contact' => '0123456789',
                'password' => bcrypt('password'),
                'registration_number' => 'BCD890',
                'office_location' => 'Location 10',
            ],
        ];

        DB::table('companies')->insert($companies);
    }

}
