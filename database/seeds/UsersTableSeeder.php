<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $user = new User;
        $user->name = "Annette";
        $user->email = "annette@haven.com";
        $user->password = bcrypt('123456');
        $user->save();

         $user = new User;
        $user->name = "Linda";
        $user->email = "linda@deep.com";
        $user->password = bcrypt('123456');
        $user->save();
    }
}
