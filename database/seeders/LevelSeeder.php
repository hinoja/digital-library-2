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
   
        Level::create(['name' => 'NIVEAU1','code'=>'1']);
        Level::create(['name' => 'NIVEAU2','code'=>'2']);
        Level::create(['name' => 'NIVEAU3','code'=>'3']);
        Level::create(['name' => 'NIVEAU4','code'=>'4']); 
        Level::create(['name' => 'NIVEAU5','code'=>'5']);
        Level::create(['name' => 'NIVEAUPlus','code'=>'>5']); 
    }
}
