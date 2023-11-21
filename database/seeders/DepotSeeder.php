<?php

namespace Database\Seeders;

use App\Models\Depot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $depot1=Depot::create([
            'designation' => 'PRINCIPALE',
        ]);
        $depot2=Depot::create([
            'designation' => 'ETAGE',
        ]);
        $depot3=Depot::create([
            'designation' => 'REZ',
        ]);
        $depot4=Depot::create([
            'designation' => 'MENAGERE',
        ]);
    }
}
