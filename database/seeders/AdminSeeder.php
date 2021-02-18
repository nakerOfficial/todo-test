<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    protected string $alias = 'admin';
    protected string $menu = 'seeds/com/files/roles/menu/admin.php';
    protected string $permissions = 'seeds/com/files/roles/permissions/admin.json';
}
