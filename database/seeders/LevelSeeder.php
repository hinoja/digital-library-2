<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Level::create(['name' => 'NIVEAU 1','code'=>'1']);
        Level::create(['name' => 'NIVEAU 2','code'=>'2']);
        Level::create(['name' => 'NIVEAU 3','code'=>'3']);
        Level::create(['name' => 'NIVEAU 4','code'=>'4']);
        Level::create(['name' => 'NIVEAU 5','code'=>'5']);
        Level::create(['name' => 'NIVEAU > 5','code'=>'>5']);
    }
}
