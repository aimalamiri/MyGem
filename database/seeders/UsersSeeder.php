<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFactory::new()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);

        UserFactory::new()->count(10)->create([
            'role' => 'member'
        ]);
        UserFactory::new()->count(10)->create([
            'role' => 'instructor'
        ]);
    }
}
