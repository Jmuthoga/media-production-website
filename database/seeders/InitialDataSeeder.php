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
        $cats = ['Photography', 'Videography', 'Our Work', 'Academy', 'Others'];
        foreach ($cats as $c) Category::create(['name' => $c, 'slug' => \Str::slug($c), 'description' => "Services under {$c}"]);

        $counties = ['Nairobi', 'Kiambu', 'Mombasa', 'Kisumu', 'Nakuru', 'Machakos', 'Meru', 'Kisii', 'Kericho', 'Kilifi'];
        foreach ($counties as $cn) County::create(['name' => $cn, 'slug' => \Str::slug($cn), 'description' => "Services in {$cn}"]);

        // create an admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@unimax.test',
            'password' => bcrypt('secret123'),
            'is_admin' => true
        ]);
    }
}
