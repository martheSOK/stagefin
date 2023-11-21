<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user1=User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('adminadmin'), // password
        ]);
        $user1->assignRole('admin');



        $user2=User::create([
            'name' => 'gerant',
            'email' => 'gerant@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('gerantgerant'), // password
        ]);
        $user2->assignRole('gerant');
    }
}
