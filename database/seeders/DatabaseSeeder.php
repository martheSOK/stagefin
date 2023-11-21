<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Depot;
use App\Models\Fournisseur;
use App\Models\TypeEmballage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call([
            RoleSeeder::class,
            AdminSeeder::class,
            DepotSeeder::class,
            FournisseurSeeder::class,
            TypeEmballageSeeder::class,
            DashboardTableSeeder::class,
        ]);
    }
}
