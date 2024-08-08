<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Kevin',
            'email' => 'Kevin@kEVIN.COM',
            'email_verified_at' => now(),
            'password' => Hash::make('Kevinxito8351'),
            'remember_token' => Str::random(10),
        ]);
        // Crear 10 usuarios usando el factory
        User::factory()->count(1)->create();
    }
}
