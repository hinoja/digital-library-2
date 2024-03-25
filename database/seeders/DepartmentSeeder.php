<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::create(['name' => 'Génie Informatique']);
        Department::create(['name' => 'Génie Electrique']);
        Department::create(['name' => 'Génie Forestier ']);
        Department::create(['name' => 'Mathematique']);
        Department::create(['name' => 'Agriculture']);
        Department::create(['name' => 'Physique']); 
        Department::create(['name' => 'Psychologie']);
        Department::create(['name' => 'ITH']);
        Department::create(['name' => 'Lettre Bilingue']);
    }
}
