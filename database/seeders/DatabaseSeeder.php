<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\MediaGallery;
use App\Models\News;
use App\Models\Product;
use App\Models\ProductCategory;
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
        Admin::create([
        'username' => 'superadmin',
        'email' => 'superadmin@admin.com',
        'role' => 'super_admin',
        'status' => 1,
        'password' => Hash::make('password'), // password
        ]);
        Admin::create([
        'username' => 'admin',
        'email' => 'admin@admin.com',
        'role' => 'admin',
        'status' => 1,
        'password' => Hash::make('password'), // password
        ]);
        Admin::create([
        'username' => 'manager',
        'email' => 'manager@admin.com',
        'role' => 'manager',
        'status' => 1,
        'password' => Hash::make('password'), // password
        ]);
        Customer::factory(5)->create();
        ProductCategory::factory(5)->create();
        Product::factory(5)->create();
        News::factory(5)->create();
        MediaGallery::factory(5)->create();
    }
}
