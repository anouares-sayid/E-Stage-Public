<?php



use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'user_management_access',
            'permission_create',
            'permission_edit',
            'permission_show',
            'permission_delete',
            'permission_access',
            'role_create',
            'role_edit',
            'role_show',
            'role_delete',
            'role_access',
            'user_create',
            'user_edit',
            'user_show',
            'user_delete',
            'user_access',
            'DocFile_access',
            'DocFile_create',
            'DocFile_show',
            'DocFile_edit',
            'DocFile_delete',
            'professeur_access',
            'professeur_create',
            'professeur_show',
            'professeur_edit',
            'professeur_delete'
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        // gets all permissions via Gate::before rule; see AuthServiceProvider
        Role::create(['name' => 'Super Admin']);

        $Role = Role::create(['name' => 'User']);

        $userPermissions = [
            'DocFile_access',
            'DocFile_create',
            'DocFile_show',
            'DocFile_edit',
            'DocFile_delete',
        ];

        foreach ($userPermissions as $permission) {
            $Role->givePermissionTo($permission);
        }

        $role = Role::create(['name' => 'Professeur']);

        $professeurPermissions = [
            'professeur_access',
            'professeur_create',
            'professeur_show',
            'professeur_edit',
            'professeur_delete'
        ];
        foreach ($professeurPermissions as $permission) {
            $role->givePermissionTo($permission);
        }
    }
}
