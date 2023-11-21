<?php

namespace Database\Seeders;

use App\Models\Fournisseur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $fourni1=Fournisseur::create([
            'nom_fournisseur' => 'Matata',
            'contact'=> '97845621',
            'adresse'=> 'kara-lama',
        ]);

        $fourni2=Fournisseur::create([
            'nom_fournisseur' => 'Malim',
            'contact'=> '91845628',
            'adresse'=> 'kara-tomde',
        ]);
        $fourni3=Fournisseur::create([
            'nom_fournisseur' => 'Sodibo',
            'contact'=> '92874510',
            'adresse'=> 'kara-donghoyo',
        ]);
    
    
    }
}
