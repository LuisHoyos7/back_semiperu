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
        // -------------------- ROLES - USUARIOS ------------------------//
        $adminRole                      = Role::create(['name'=>'Admin']);
        $PersonalRole                   = Role::create(['name'=>'Personal']);
        $ProjectRole                    = Role::create(['name'=>'Project']);
        $ControllerRole                 = Role::create(['name'=>'Controller']);
        $GerenteOperacionesRole         = Role::create(['name'=>'Manager']);
        $ContadoraRole                  = Role::create(['name'=>'Accountant']);
        $proveedorRole                  = Role::create(['name'=>'Supplier']);
        // ------------------------------------------------------------------//

        // --------------------- PERMISOS - ORDEN DE COMPRA  ---------------------- //
        // - PROVEEDOR
        $uploadFilePurchaseOrder        = Permission::create(['name'=> 'Upload File Purchase Order']);
        $updateFilePurchaseOrder        = Permission::create(['name'=> 'Update File Purchase Order']);
        $createRecordOfConformity       = Permission::create(['name'=> 'Create Record Conformity']);
        $createProofOfPayment           = Permission::create(['name'=> 'Create Proof Payment']);

        // ------------------------------------------------------------- //
        $proveedorRole->givePermissionTo($uploadFilePurchaseOrder);
        $proveedorRole->givePermissionTo($updateFilePurchaseOrder);
        $proveedorRole->givePermissionTo($createRecordOfConformity);
        $proveedorRole->givePermissionTo($createProofOfPayment);
        // - PROJECT MANAGER
        $createPurchaseRequest          = Permission::create(['name'=> 'Create Purchase Request']);
        $updatePurchaseRequest          = Permission::create(['name'=> 'Update Purchase Request']);
        $ProjectRole->givePermissionTo($createPurchaseRequest);
        $ProjectRole->givePermissionTo($updatePurchaseRequest);

        // -------------------------- PERMISOS ADICIONALES ---------------------------- //
        $viewUsersPermission    = Permission::create(['name' => 'View users']);
        $createUsersPermission  = Permission::create(['name' => 'Create users']);
        $updateUsersPermission  = Permission::create(['name' => 'Update users']);
        $deleteUsersPermission  = Permission::create(['name' => 'Delete users']);
        $specialUsersPermission = Permission::create(['name' => 'Special users']);

        $viewRolesPermission    = Permission::create(['name' => 'View roles']);
        $createRolesPermission  = Permission::create(['name' => 'Create roles']);
        $updateRolesPermission  = Permission::create(['name' => 'Update roles']);
        $deleteRolesPermission  = Permission::create(['name' => 'Delete roles']);

        $viewPermission         = Permission::create(['name' => 'View permissions']);
        $updatePermission       = Permission::create(['name' => 'Update permissions']);

        // -----------------------------------------------------------------------------------//

        // --------------------------- CREACION USUARIOS ---------------------------------- //
        $proveedor = new User();
        $proveedor->name = 'Proveedor 1';
        $proveedor->email = 'proveedor@portalsemiperu.com';
        $proveedor->password = bcrypt('12345');
        $proveedor->save();

        $proveedor->assignRole($proveedorRole);

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
        $project->assignRole($ProjectRole);

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
    }
}
