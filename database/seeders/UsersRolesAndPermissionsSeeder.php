<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class UsersRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'access dashboard',
        ];

        // Create permissions in the database
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $superAdminRole = Role::create(['name' => 'super-admin']);
        $adminRole = Role::create(['name' => 'admin']);

        // Assign all permissions to super-admin
        $superAdminRole->givePermissionTo($permissions);

        // Assign a subset of permissions to admin
        $adminPermissions = [
            'access dashboard',
        ];
        $adminRole->givePermissionTo($adminPermissions);

        // Create users by role
        $superAdminUser = User::create([
            'name' => 'Zachran Razendra',
            'email' => 'zachranraze@recodex.id',
            'password' => bcrypt('admin123'),
        ]);
        $superAdminUser->assignRole($superAdminRole);

        $adminUser = User::create([
            'name' => 'Adnin Farizie',
            'email' => 'adninfarizie@recodex.id',
            'password' => bcrypt('admin123'),
        ]);
        $adminUser->assignRole($adminRole);

        $adminUser2 = User::create([
            'name' => 'Raista Firdaus',
            'email' => 'raistafirdaus@recodex.id',
            'password' => bcrypt('admin123'),
        ]);
        $adminUser2->assignRole($adminRole);

        $adminUser3 = User::create([
            'name' => 'Taufan Rahmat',
            'email' => 'taufan@recodex.id',
            'password' => bcrypt('admin123'),
        ]);
        $adminUser3->assignRole($adminRole);

        // Create a regular user without any role
        User::create([
            'name' => 'Regular User',
            'email' => 'user@recodex.id',
            'password' => bcrypt('user123'),
        ]);
    }
}
