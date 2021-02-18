<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
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
        $this->addRoleAndPermissions('super-admin', ['writer editor']);
        $this->addRoleAndPermissions('admin', ['writer editor']);
        $this->addRoleAndPermissions('user', ['writer']);
    }

    private function addRoleAndPermissions(string $name, array $permissions = []): void
    {
        $role = Role::findOrCreate($name);

        foreach ($permissions as $value) {
            $permission = Permission::findOrCreate($value);
            $role->givePermissionTo($permission);
        }
    }

    private function addSuperUser(): void
    {
        $email = 'naker.official@gmail.com';

        if(!User::where('email', '=',  $email)->exists())
        {
            $user = User::create([
                'name' => 'Iurii Rosca',
                'email' =>  $email,
                'password' => bcrypt('123456'),
            ]);
            $user->assignRole('super-admin');
        }
    }
}
