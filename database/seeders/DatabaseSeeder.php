<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Customer;
use App\Models\MediaGallery;
use App\Models\News;
use App\Models\ProductCategory;
use App\Models\ProductGoodStatus;
use App\Models\ProductGroup;
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
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'superadmin@admin.com',
        'role' => 'super_admin',
        'status' => 1,
        'password' => Hash::make('password'), // password
        ]);
        Admin::create([
        'username' => 'admin',
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'admin@admin.com',
        'role' => 'admin',
        'status' => 1,
        'password' => Hash::make('password'), // password
        ]);
        Admin::create([
        'username' => 'manager',
        'first_name' => 'John',
        'last_name' => 'Doe',
        'email' => 'manager@admin.com',
        'role' => 'manager',
        'status' => 1,
        'password' => Hash::make('password'), // password
        ]);
        Customer::factory(5)->create();
        ProductCategory::factory(5)->create();
        News::factory(5)->create();
        MediaGallery::factory(5)->create();
        ProductGroup::factory(5)->create();

        ProductGoodStatus::create([
        'name' => 'draft',
        'status' => '1',
        'type' => '3',
        ]);
        ProductGoodStatus::create([
        'name' => 'reserved',
        'status' => '1',
        'type' => '3',
        ]);
        ProductGoodStatus::create([
        'name' => 'awaiting_moderation',
        'status' => '1',
        'type' => '3',
        ]);
        ProductGoodStatus::create([
        'name' => 'approved',
        'status' => '1',
        'type' => '2',
        ]);
    }
}
