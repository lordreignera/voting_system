<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create roles
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $voterRole = Role::firstOrCreate(['name' => 'Voter']);

        // Create permissions
        $permissions = [
            // Election Management
            'manage elections',
            'create elections',
            'edit elections',
            'delete elections',
            'view elections',
            
            // Candidate Management
            'manage candidates',
            'create candidates',
            'edit candidates',
            'delete candidates',
            'view candidates',
            
            // Voter Management
            'manage voters',
            'create voters',
            'edit voters',
            'delete voters',
            'view voters',
            'import voters',
            
            // Vote Management
            'view votes',
            'view results',
            'export results',
            
            // OTP Management
            'generate otps',
            'send otps',
            'view otp logs',
            
            // System Management
            'manage system settings',
            'view audit logs',
            'manage permissions',
            
            // Voting Rights
            'cast vote',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Assign all permissions to Super Admin
        $superAdminRole->syncPermissions(Permission::all());
        
        // Assign only voting permission to Voter
        $voterRole->syncPermissions(['cast vote']);

        // Create Super Admin User
        $superAdmin = User::firstOrCreate(
            ['email' => 'admin@votingsystem.com'],
            [
                'name' => 'Super Administrator',
                'phone' => '+1234567890',
                'email' => 'admin@votingsystem.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Admin@123'), // Strong default password
            ]
        );

        // Assign Super Admin role
        $superAdmin->assignRole('Super Admin');

        // Create a sample voter user for testing
        $voter = User::firstOrCreate(
            ['email' => 'voter@example.com'],
            [
                'name' => 'Sample Voter',
                'phone' => '+0987654321',
                'email' => 'voter@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('Voter@123'),
            ]
        );

        // Assign Voter role
        $voter->assignRole('Voter');

        $this->command->info('Super Admin and sample users created successfully!');
        $this->command->info('Super Admin Login: admin@votingsystem.com');
        $this->command->info('Super Admin Password: Admin@123');
        $this->command->info('Sample Voter Login: voter@example.com');
        $this->command->info('Sample Voter Password: Voter@123');
    }
}
