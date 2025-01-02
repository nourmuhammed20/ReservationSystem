<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

       $user1 = User::factory()->create([
            'name' => 'Abdelkader kamel',
            'email' => 'officer@foro.gov',
            'password' => bcrypt('password'),
        ]);

        $user2 = User::factory()->create([
                'name' => 'yasser',
                'email' => 'yasser@foro.gov',
                'password' => bcrypt('password'),
            ]);


        // $role1 = Role::create(['name' => 'commander']);
        // $role2 = Role::create(['name' => 'officer']);
        // $role3 = Role::create(['name' => 'admin']);
        $user1->assignRole('officer');
        $user2->assignRole('commander');
    }
}