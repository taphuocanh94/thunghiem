<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'role' => 'Admin',
            ],
            [
                'name' => 'Payroll Accountant User',
                'email' => 'payroll@example.com',
                'password' => Hash::make('password'),
                'role' => 'Payroll Accountant',
            ],
            [
                'name' => 'Chief Accountant User',
                'email' => 'chief@example.com',
                'password' => Hash::make('password'),
                'role' => 'Chief Accountant',
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@example.com',
                'password' => Hash::make('password'),
                'role' => 'Manager',
            ],
            [
                'name' => 'Regular Employee',
                'email' => 'employee@example.com',
                'password' => Hash::make('password'),
                'role' => 'Employee',
            ],
        ];

        foreach ($users as $userData) {
            $roleName = $userData['role'];
            unset($userData['role']);
            
            $user = User::create($userData);
            $user->assignRole($roleName);
        }
    }
}