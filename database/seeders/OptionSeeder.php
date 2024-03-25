<?php

namespace Database\Seeders;

use App\Models\Option;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Option::create(['name' => 'Informatique Fondamentale','department_id'=>1]);
        Option::create(['name' => 'informatique industrielle','department_id'=>1]);
        Option::create(['name' => 'TIC ','department_id'=>1]);
        Option::create(['name' => 'ANGLAIS ','department_id'=>9]);
        Option::create(['name' => 'FRANçAIS ','department_id'=>9]);
        Option::create(['name' => 'ELECTRONIQUE ','department_id'=>2]);
    }
}
