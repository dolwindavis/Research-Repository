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
            'department_id' => 1,
            'slug' => 'dolwin-davis-kjcadmin'
        ]);
        DB::table('users')->insert([
            'name' => "Dolwin Davis",
            'email' => "dolwin@gmail.com",
            'password' => bcrypt('19161412'),
            'role' => 'faculty',
            'fac_id' => '12345',
            'department_id' => 1,
            'slug' => 'dolwin-davis',
            'email_verified_at' => '2019-08-29 08:52:20'
        ]);

        DB::table('departments')->insert([
        [   
            'id'=> 1,
            'name' => "MBA",
        ],
        [
            "id" => 2,
            'name' => "MCA",
        ]
        ]);

        DB::table('journal_categories')->insert([
        [
            'name' => "Journal",
        ],
        [
            'name' => "Newsletter",
        ],
        [
            'name' => "Conference Proceeding",
        ]
        ]);

        DB::table('journal_types')->insert([
        [
            'name' => "National",
        ],
        [
            'name' => "International",
        ]
        ]);

        DB::table('authorships')->insert([
        [
            'name' => "First Author",
        ],
        [
            'name' => "Second Author",
        ],
        [
            'name' => "Third Author",
        ]
        ]);
        
        DB::table('research_categories')->insert([
            [   
                'id' => 1,
                'name' => "Internal Projects",
            ],
            [   
                'id' => 2,
                'name' => "External Projects",
            ]
            ]);
        DB::table('research_agencies')->insert([
            [   
                'category_id' => 1,
                'name' => "KJC",
            ],
            [   
                'category_id' => 2,
                'name' => "UGC",
            ],[   
                'category_id' => 2,
                'name' => "DST",
            ],[   
                'category_id' => 2,
                'name' => "VGST",
            ]
            ]);
            DB::table('research_roles')->insert([
                [   
                    'name' => "Principal Investigator",
                ],
                [   
                    'name' => "Co-Investigator",
                ]
            ]);       
        
      
    }
}
