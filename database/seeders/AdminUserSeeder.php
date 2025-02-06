<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultDepartment = Department::firstOrCreate(['name' => 'Administración']);
        
        User::create([
            'first_name'     => 'Admin',
            'last_name'     => 'jmpp',
            'email'    => 'admin@example.com',
            'password' => Hash::make('contraseña_segura'),
            'department_id' => $defaultDepartment->id,
            'alias'     => 'admin',
        ]);
    }
}
