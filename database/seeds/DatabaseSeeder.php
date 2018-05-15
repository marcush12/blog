<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');//desabilitando check da foreign key para não dar erro

        $this->call(UsersTableSeeder::class);
        $this->call(PostsTableSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');//re-habilitando check da foreign key
    }
}
