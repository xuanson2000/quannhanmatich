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
        $data = [
            [
                'username' => 'admin1',
                'password' => bcrypt('123456'),
            ],
            
        ];
        DB::table('quantri')->insert($data);
    }
}
