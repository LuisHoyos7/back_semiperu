<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $adminRole = Role::create(['name'=>'Admin']);
        $PersonalRole = Role::create(['name'=>'Personal']);
        $ProjectRole = Role::create(['name'=>'Project']);
        $ControllerRole = Role::create(['name'=>'Controller']);
        $GerenteOperacionesRole = Role::create(['name'=>'Manager']);
        $ContadoraRole = Role::create(['name'=>'Accountant']);

        //reportes
        // $reportSolicitudPermission = Spatie\Permission\Models\Permission::create(['name' => 'Report', 'display_name'=>'Reportes']);
        // $reportRendicionPermission = Spatie\Permission\Models\Permission::create(['name' => 'Report Reembolso', 'display_name'=>'Reportes Reembolso']);
        $reportSolicitudPermission = Permission::create(['name' => 'Report']);
        $ControllerRole->givePermissionTo($reportSolicitudPermission);
        // Permisos de solicitud
        $viewSolicitudPermission = Permission::create(['name' => 'View Request']);
        $ProjectRole->givePermissionTo($viewSolicitudPermission);
        $ControllerRole->givePermissionTo($viewSolicitudPermission);
        $GerenteOperacionesRole->givePermissionTo($viewSolicitudPermission);
        $createSolicitudPermission = Permission::create(['name' => 'Create Request']);

        $ProjectRole->givePermissionTo($createSolicitudPermission);
        $ControllerRole->givePermissionTo($createSolicitudPermission);
        $GerenteOperacionesRole->givePermissionTo($createSolicitudPermission);
        $updateSolicitudPermission = Permission::create(['name' => 'Update Request']);

        $ControllerRole->givePermissionTo($updateSolicitudPermission);
        $downloadSolicitudPermission = Permission::create(['name' => 'Download Request']);

        $ControllerRole->givePermissionTo($downloadSolicitudPermission);
        $GerenteOperacionesRole->givePermissionTo($downloadSolicitudPermission);

        $SpecialSolicitudPermission = Permission::create(['name' => 'Special Request']);
        $ControllerRole->givePermissionTo($SpecialSolicitudPermission);

        // Permisos de Rendición
        $viewRendicionPermission = Permission::create(['name' => 'View Surrender']);
        $ProjectRole->givePermissionTo($viewRendicionPermission);
        $ControllerRole->givePermissionTo($viewRendicionPermission);
        $GerenteOperacionesRole->givePermissionTo($viewRendicionPermission);
        $ContadoraRole->givePermissionTo($viewRendicionPermission);

        $createRendicionPermission = Permission::create(['name' => 'Create Surrender']);

        $PersonalRole->givePermissionTo($createRendicionPermission);
        $ProjectRole->givePermissionTo($createRendicionPermission);
        $ControllerRole->givePermissionTo($createRendicionPermission);
        $GerenteOperacionesRole->givePermissionTo($createRendicionPermission);

        $updateRendicionPermission = Permission::create(['name' => 'Update Surrender']);

        $ControllerRole->givePermissionTo($updateRendicionPermission);
        $GerenteOperacionesRole->givePermissionTo($updateRendicionPermission);

        $downloadRendicionPermission = Permission::create(['name' => 'Download Surrender']);

        $ControllerRole->givePermissionTo($downloadRendicionPermission);
        $GerenteOperacionesRole->givePermissionTo($downloadRendicionPermission);

        $PaymentsRendicionPermission = Permission::create(['name' => 'Payments Surrender']);

        $specialRendicionPermission = Permission::create(['name' => 'Special Surrender']);
        // $ControllerRole->givePermissionTo($PaymentsRendicionPermission);
        $ControllerRole->givePermissionTo($specialRendicionPermission);
        $ControllerRole->givePermissionTo($PaymentsRendicionPermission);
        $ContadoraRole->givePermissionTo($PaymentsRendicionPermission);

        $mergeRendicionPermission = Permission::create(['name' => 'Merge Surrender']);

        $ControllerRole->givePermissionTo($mergeRendicionPermission);
        $ContadoraRole->givePermissionTo($mergeRendicionPermission);

        $viewUsersPermission = Permission::create(['name' => 'View users']);
        $createUsersPermission = Permission::create(['name' => 'Create users']);
        $updateUsersPermission = Permission::create(['name' => 'Update users']);
        $deleteUsersPermission = Permission::create(['name' => 'Delete users']);
        $specialUsersPermission = Permission::create(['name' => 'Special users']);

        $viewRolesPermission = Permission::create(['name' => 'View roles']);
        $createRolesPermission = Permission::create(['name' => 'Create roles']);
        $updateRolesPermission = Permission::create(['name' => 'Update roles']);
        $deleteRolesPermission = Permission::create(['name' => 'Delete roles']);


        $viewPermission = Permission::create(['name' => 'View permissions']);
        $updatePermission = Permission::create(['name' => 'Update permissions']);

        // para actualizar reembolso
        // $actualizarRendicionReembolsoPermission = Spatie\Permission\Models\Permission::create(['name' => 'Update Refund']);


        $admin = new User();

        $admin->name = 'Administrador';
        $admin->email = 'admin@portalsemiperu.com';
        $admin->password = bcrypt('12345');

        $admin->save();

        $admin->assignRole($adminRole);


        $personal = new User();

        $personal->name = 'personal 1';
        $personal->email = 'personal1@gmail.com';
        $personal->password = bcrypt('12345');

        $personal->save();

        $personal->assignRole($PersonalRole);

        $personal = new User();

        $personal->name = 'personal 2';
        $personal->email = 'personal2@gmail.com';
        $personal->password = bcrypt('12345');

        $personal->save();

        $personal->assignRole($PersonalRole);


        $project = new User();

        $project->name = 'Jose Machaca';
        $project->email = 'jose.machaca@gmail.com';
        $project->password = bcrypt('12345');

        $project->save();

        $project = new User();

        $project->name = 'Alejandro Lopez';
        $project->email = 'alejandro.lopez@gmail.com';
        $project->password = bcrypt('12345');

        $project->save();

        $project->assignRole($ProjectRole);


        $controller = new User();

        $controller->name = 'Erick Soto';
        $controller->email = 'erick.soto@gmail.com';
        $controller->password = bcrypt('12345');

        $controller->save();

        $controller->assignRole($ControllerRole);

        $manager = new User();

        $manager->name = 'Francisco';
        $manager->email = 'francisco@gmail.com';
        $manager->password = bcrypt('12345');

        $manager->save();

        $manager->assignRole($GerenteOperacionesRole);


        $manager = new User();

        $manager->name = 'Contadora';
        $manager->email = 'contadora@gmail.com';
        $manager->password = bcrypt('12345');

        $manager->save();

        $manager->assignRole($ContadoraRole);

        // Storage::disk('public')->deleteDirectory('rendicion');
        // Storage::disk('public')->deleteDirectory('users');
        // Storage::disk('public')->deleteDirectory('generatedPdf');
        // Storage::disk('public')->deleteDirectory('merge');
        // Storage::disk('public')->deleteDirectory('import');

        // Storage::disk('public')->makeDirectory('generatedPdf');
        // Storage::disk('public')->makeDirectory('merge');
        // Storage::disk('public')->makeDirectory('import');
    }
}
