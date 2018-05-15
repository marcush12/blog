<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Traits\HasRoles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name'=>'Admin']);
        $writerRole = Role::create(['name'=>'Writer']);

        $admin = new User;
        $admin->name = "Annette";
        $admin->email = "annette@haven.com";
        $admin->password = bcrypt('123456');
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = "Linda";
        $writer->email = "linda@deep.com";
        $writer->password = bcrypt('123456');
        $writer->save();

        $writer->assignRole($writerRole);
    }
}
