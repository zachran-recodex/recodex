<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersRolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions (not team specific)
        $permissions = [
            'manage users',
            'view users',
            'create users',
            'edit users',
            'delete users',
            'manage roles',
            'manage permissions',
            'manage teams',
            'create teams',
            'edit teams',
            'delete teams',
            'add team members',
            'remove team members'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission, 'guard_name' => 'web']);
        }

        // Create the super admin user first
        $superAdminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Create super admin's personal team
        $superAdminTeam = Team::forceCreate([
            'user_id' => $superAdminUser->id,
            'name' => "Super Admin's Team",
            'personal_team' => true,
        ]);

        $superAdminUser->current_team_id = $superAdminTeam->id;
        $superAdminUser->save();

        // Create the super-admin role for the super admin's team
        $superAdminRole = Role::create([
            'name' => 'super-admin',
            'guard_name' => 'web',
            'team_id' => $superAdminTeam->id
        ]);

        // Give all permissions to super-admin role
        $superAdminRole->givePermissionTo(Permission::all());

        // Assign the super-admin role to the super admin user directly using DB
        DB::table('model_has_roles')->insert([
            'role_id' => $superAdminRole->id,
            'model_type' => User::class,
            'model_id' => $superAdminUser->id,
            'team_id' => $superAdminTeam->id
        ]);

        // Create other default users with their teams and roles
        $users = [
            [
                'name' => 'Member User',
                'email' => 'member@example.com',
                'role' => 'member',
                'permissions' => ['view users']
            ],
            [
                'name' => 'Manager User',
                'email' => 'manager@example.com',
                'role' => 'manager',
                'permissions' => ['view users', 'manage teams', 'create teams', 'edit teams']
            ],
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'role' => 'admin',
                'permissions' => ['manage users', 'view users', 'create users', 'edit users', 'delete users', 'manage teams']
            ],
        ];

        foreach ($users as $userData) {
            // Create user
            $user = User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]);

            // Create personal team
            $team = Team::forceCreate([
                'user_id' => $user->id,
                'name' => explode(' ', $user->name, 2)[0]."'s Team",
                'personal_team' => true,
            ]);

            $user->current_team_id = $team->id;
            $user->save();

            // Create role for this team
            $role = Role::create([
                'name' => $userData['role'],
                'guard_name' => 'web',
                'team_id' => $team->id
            ]);

            // Assign permissions to role
            $role->givePermissionTo($userData['permissions']);

            // Assign role to user directly using DB
            DB::table('model_has_roles')->insert([
                'role_id' => $role->id,
                'model_type' => User::class,
                'model_id' => $user->id,
                'team_id' => $team->id
            ]);
        }
    }
}
