<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => "Dolwin Davis",
            'email' => "dolwin.davis@gmail.com",
            'password' => bcrypt('19161412'),
            'role' => 'admin',
            'fac_id' => 'kjcadmin',
            'department_id' => 0,
            'slug' => 'dolwin-davis-kjcadmin'
        ]);

        
    }
}
