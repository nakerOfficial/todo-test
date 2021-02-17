<?php

namespace Database\Seeders\inn\roles;

use App\Models\User;
use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

abstract class RoleSeeder extends Seeder
{
    //  Client ID: 3
    //  Client secret: lc3pBucAyl37CFzaxndLYTkNbq0Z7lYX6r3Hqnqp

    protected Role $role;
    protected string $alias;
    protected string $permissions;
    protected string $menu;
    protected Collection $menuItems;

    public function run(): void
    {
        $this->applyPermissions();
        $this->addSuperUser();
    }

    protected function applyPermissions(): void
    {
        $this->addRoleAndPermissions('super-admin');
        $this->addRoleAndPermissions('admin');
        $this->addRoleAndPermissions('user');
    }

    private function addRoleAndPermissions(string $name, array $permissions = []): void
    {
        $role = Role::create(['name' => $name]);

        foreach ($permissions as $value) {
            $permission = Permission::create(['name' => $value]);
            $role->givePermissionTo($permission);
        }
    }

    private function addSuperUser(): void
    {
        $user = User::create([
            'name' => 'Iurii Rosca',
            'email' => 'naker.official@gmail.com',
            'password' => bcrypt('123456'),
        ]);
        $user->assignRole('super-admin');
    }

}
