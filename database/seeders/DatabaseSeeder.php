<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Keyword;
use App\Models\Document;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\TypeSeeder;
use Database\Seeders\LevelSeeder;
use Database\Seeders\OptionSeeder;
use Database\Seeders\DocumentSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
        $this->call([
            DepartmentSeeder::class, 
            CategorySeeder::class,
            OptionSeeder::class,
            TypeSeeder::class,
            LevelSeeder::class,
            RoleSeeder::class,
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role_id' => 1,
            'password' => Hash::make("password"),
        ]);
        User::factory(10) 
        //   ->hasDocuments(3)
         ->create();
         Department::factory(2)
                ->hasOptions(3)
                ->create();
       
        Document::factory(10)
        ->hasCategories(3)
        ->create();
        
    }
}
