<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Bus;
use App\Models\User;
use App\Models\Admin;
use App\Models\Route;
use App\Models\Company;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(CompanySeeder::class);
        $this->call(RouteSeeder::class);
        Bus::factory()->count(50)->create();
        Schedule::factory()->count(25)->create();

        User::factory()->create(
            [
                'name' => 'Ranjan Khanal',
                'email' => 'ranjan@btms.com',
                'contact' => '9863796379',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                // 'remember_token' => Str::random(10),
                ]
        );
        User::factory()->create(
            [
                'name' => 'Reetesh Choudary',
                'email' => 'reetesh@btms.com',
                'contact' => '9809229946',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                // 'remember_token' => Str::random(10),
            ]
        );
        User::factory()->create(
            [
                'name' => 'Sabin Adhikari',
                'email' => 'sabin@btms.com',
                'contact' => '9845023545',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                // 'remember_token' => Str::random(10),
            ]
        );
        // Admin::factory()->create();
        // Company::factory()->create();

        // Bus::factory()
        // ->create([
        //     'company_id' => 1,
        //     'number_plate' => 'AB-Pra-12-345-KA-6789',
        //     'contact' => '9812132121',
        //     'seats' => '50',
        //     'type' => 'Tourist',
        //     // add any other fields as needed
        // ]);
        
        // Bus::factory()
        //     ->create([
        //         'company_id' => 1,
        //         'number_plate' => 'CD-Pra-23-456-KA-7890',
        //         'contact' => '981213210',
        //         'seats' => '50',
        //         'type' => 'Tourist',
        //     ]);

        // create two specific routes and associate them with the company
        // Route::factory()
        //     ->create([
        //         'company_id' => 1,
        //         'origin' => 'Kathmandu',
        //         'destination' => 'Pokhara',
        //         'estimated_time' => '7',
        //         'distance' => '190',
        //         'via' => 'Muglin',
        //     ]);

        // Route::factory()
        //     ->create([
        //         'company_id' => 1,
        //         'origin' => 'Pokhara',
        //         'destination' => 'Chitwan',
        //         'estimated_time' => '5',
        //         'distance' => '135',
        //         'via' => 'Muglin',
        //     ]);

        // Bus::factory(20)->create();
        // Route::factory(20)->create();
        // Schedule::factory(20)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        
    }
}
