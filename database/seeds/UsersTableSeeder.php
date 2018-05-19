<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name'=>'Admin', 'display_name'=>'Administrador']);
        $writerRole = Role::create(['name'=>'Writer', 'display_name'=>'Escritor']);

        $viewPostsPermission = Permission::create([
            'name'=>'View posts',
            'display_name'=>'Ver Posts'
        ]);
        $createPostsPermission = Permission::create([
            'name'=>'Create posts',
            'display_name'=>'Criar Posts'
        ]);
        $updatePostsPermission = Permission::create([
            'name'=>'Update posts',
            'display_name'=>'Atualizar Posts'
        ]);
        $deletePostsPermission = Permission::create([
            'name'=>'Delete posts',
            'display_name'=>'Eliminar Posts'
        ]);

        $viewUsersPermission = Permission::create([
            'name'=>'View users',
            'display_name'=>'Ver usuários'
        ]);
        $createUsersPermission = Permission::create([
            'name'=>'Create users',
            'display_name'=>'Criar usuários'
        ]);
        $updateUsersPermission = Permission::create([
            'name'=>'Update users',
            'display_name'=>'Atualizar usuários'
        ]);
        $deleteUsersPermission = Permission::create([
            'name'=>'Delete users',
            'display_name'=>'Eliminar usuários'
        ]);

        $viewRolesPermission = Permission::create([
            'name'=>'View roles',
            'display_name'=>'Ver papéis'
        ]);
        $createRolesPermission = Permission::create([
            'name'=>'Create roles',
            'display_name'=>'Criar papéis'
        ]);
        $updateRolesPermission = Permission::create([
            'name'=>'Update roles',
            'display_name'=>'Atualizar papéis'
        ]);
        $deleteRolesPermission = Permission::create([
            'name'=>'Delete roles',
            'display_name'=>'Deletar papéis'
        ]);
        $viewPermissionsPermission = Permission::create([
            'name'=>'View permissions',
            'display_name'=>'Ver permissões'
        ]);
        $updatePermissionsPermission = Permission::create([
            'name'=>'Update permissions',
            'display_name'=>'Atualizar permissões'
        ]);
        //$updateRolesPermission = Permission::create(['name'=>'Update roles']);

        $admin = new User;
        $admin->name = "Annette";
        $admin->email = "annette@haven.com";
        //$admin->password = bcrypt('123456');//já foi encriptado em User.php
        $admin->password = '123456';
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = "Linda";
        $writer->email = "linda@deep.com";
        //$writer->password = bcrypt('123456');
        $writer->password = '123456';
        $writer->save();

        $writer->assignRole($writerRole);
    }
}
