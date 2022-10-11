<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permisos creados desde seeders
        $admin = Role::create(['name' => 'admin']);
        $pm = Role::create(['name' => 'pm']);
        $coordinador = Role::create(['name' => 'coordinador']);
        $supervisor = Role::create(['name' => 'supervisor']);
        $gerente = Role::create(['name' => 'gerente']);
        $gerente_operaciones = Role::create(['name' => 'gerente_operaciones']);

    }
}
