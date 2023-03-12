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


        User::factory()->create();
        Admin::factory()->create();
        Company::factory()->create();

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
