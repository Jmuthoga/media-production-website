<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\County;
use App\Models\User;

class InitialDataSeeder extends Seeder
{
    public function run()
    {
        // create an admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@unimax.test',
            'password' => bcrypt('secret123'),
            'is_admin' => true
        ]);
    }
}
