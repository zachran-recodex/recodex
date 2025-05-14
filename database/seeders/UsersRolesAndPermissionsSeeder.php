<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
            'manage admin',
            'manage cms',
            'manage pm',
        ];

        // Create permissions in the database
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles
        $superAdminRole = Role::create(['name' => 'Super Admin']);
        $adminRole = Role::create(['name' => 'Admin']);

        // Assign all permissions to super-admin
        $superAdminRole->givePermissionTo($permissions);

        // Assign a subset of permissions to admin
        $adminPermissions = [
            'manage cms',
            'manage pm',
        ];
        $adminRole->givePermissionTo($adminPermissions);

        // Create users by role
        $superAdminUser = User::create([
            'name' => 'Zachran Razendra',
            'username' => 'zachranraze',
            'email' => 'zachranraze@recodex.id',
            'password' => bcrypt('admin123'),
            'about' => 'Saya adalah....',
            'social_links' => [
                'twitter' => 'http://www.twitter.com',
                'facebook' => 'http://www.facebook.com',
                'instagram' => 'http://www.instagram.com',
                'linkedin' => 'http://www.linkedin.com',
            ],
            'is_team' => true,
            'is_active' => true,
            'sort_order' => 1,
        ]);
        $superAdminUser->assignRole($superAdminRole);

        $adminUser = User::create([
            'name' => 'Adnin Farizie',
            'username' => 'adninfarizie',
            'email' => 'adninfarizie@recodex.id',
            'password' => bcrypt('admin123'),
            'about' => 'Saya adalah....',
            'social_links' => [
                'twitter' => 'http://www.twitter.com',
                'facebook' => 'http://www.facebook.com',
                'instagram' => 'http://www.instagram.com',
                'linkedin' => 'http://www.linkedin.com',
            ],
            'is_team' => true,
            'is_active' => true,
            'sort_order' => 2,
        ]);
        $adminUser->assignRole($adminRole);

        $adminUser2 = User::create([
            'name' => 'Raista Firdaus',
            'username' => 'raistafirdaus',
            'email' => 'raistafirdaus@recodex.id',
            'password' => bcrypt('admin123'),
            'about' => 'Saya adalah....',
            'social_links' => [
                'twitter' => 'http://www.twitter.com',
                'facebook' => 'http://www.facebook.com',
                'instagram' => 'http://www.instagram.com',
                'linkedin' => 'http://www.linkedin.com',
            ],
            'is_team' => true,
            'is_active' => true,
            'sort_order' => 3,
        ]);
        $adminUser2->assignRole($adminRole);

        $adminUser3 = User::create([
            'name' => 'Taufan Rahmat',
            'username' => 'taufan',
            'email' => 'taufan@recodex.id',
            'password' => bcrypt('admin123'),
            'about' => 'Saya adalah....',
            'social_links' => [
                'twitter' => 'http://www.twitter.com',
                'facebook' => 'http://www.facebook.com',
                'instagram' => 'http://www.instagram.com',
                'linkedin' => 'http://www.linkedin.com',
            ],
            'is_team' => true,
            'is_active' => true,
            'sort_order' => 4,
        ]);
        $adminUser3->assignRole($adminRole);

        // Create a regular user without any role
        User::create([
            'name' => 'Regular User',
            'username' => 'user',
            'email' => 'user@recodex.id',
            'password' => bcrypt('user123'),
            'is_team' => false,
            'is_active' => true,
        ]);
    }
}
