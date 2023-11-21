<?php

namespace Database\Seeders;

use App\Models\TypeEmballage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeEmballageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $emb1=TypeEmballage::create([
            'libelle' => 'C12 BB',
        ]);
        $emb2=TypeEmballage::create([
            'libelle' => 'C20 BB',
        ]);
        $emb3=TypeEmballage::create([
            'libelle' => 'C24 BB',
        ]);
        $emb4=TypeEmballage::create([
            'libelle' => 'C12 SNB',
        ]);
        $emb5=TypeEmballage::create([
            'libelle' => 'C24 SNB',
        ]);
        $emb6=TypeEmballage::create([
            'libelle' => 'C12-20 BB-SNB',
        ]);
    }
}
