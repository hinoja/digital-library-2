<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'Admin' ]);
        Role::create(['name' => 'Etudiant', ]);
        Role::create(['name' => 'Enseignant', ]);
       
    }
}
