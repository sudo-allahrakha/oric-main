<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
// use Illuminate\Foundation\Auth\User;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@wum.edu.pk',
            'password' => bcrypt('password'),
            // No need to assign 'role' here as it's handled via Spatie roles
        ]);

        // Ensure the 'admin' role exists
        Role::firstOrCreate(['name' => 'admin']);

        // Assign the 'admin' role to the user
        $admin->assignRole('admin');
    }
}
