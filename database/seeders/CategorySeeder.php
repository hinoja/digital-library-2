<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create(['name' => 'Dévelopement Web']);
        Category::create(['name' => 'Dévelopement Mobile ']);
        Category::create(['name' => 'Intelligence artificielle ']);
        Category::create(['name' => 'Electronique']);
        Category::create(['name' => 'Biologie']);
        Category::create(['name' => 'Traitement du Signal']);
        Category::create(['name' => 'BlockChain']);
        Category::create(['name' => 'Litterature ']);
        Category::create(['name' => 'Programmation']);
    }
}
