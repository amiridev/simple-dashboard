<?php

namespace Database\Seeders;

use App\Models\Admin;
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
        Admin::create([
            'name' => 'test-user' ,
            'family' => 'test-user',
            'username' => 'test-user',
            'mobile' => '09121112211',
            'email' => 'test-user@gmail.com',
            'password' => '$2y$10$Ae1qyE65oaeT6THFLHcNROPEMhAz6mnVhaJYmSPkKdq28de3tBHsG', // password
        ]);
    }
}
