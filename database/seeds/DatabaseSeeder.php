<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Mr User',
                'email' => 'user@email.com',
                'password' => Hash::make('password'),
                'role' => 'user',
                'meter_number' => null,
                'first_meter_reading' => null,
                'contact' => null,
                'address' => null
            ], [
                'name' => 'Mr Client',
                'email' => 'client@email.com',
                'password' => Hash::make('password'),
                'role' => 'client',
                'meter_number' => '0001',
                'first_meter_reading' => '50',
                'contact' => '071892395',
                'address' => 'mu rugo'
            ], [
                'name' => 'Mr Admin',
                'email' => 'admin@email.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'meter_number' => null,
                'first_meter_reading' => null,
                'contact' => null,
                'address' => null
            ],
        ]);
    }
}
