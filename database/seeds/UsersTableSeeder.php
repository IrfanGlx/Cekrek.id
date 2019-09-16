<?php

use Illuminate\Database\Seeder;
use Jenssegers\Mongodb\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
           'name' => 'Bambang',
           'email' => 'bambang@gmail.com',
           'password' => bcrypt('bambang'),
         ],
         [
           'name' => 'Nurhadi',
           'email' => 'nurhadi@gmail.com',
           'password' => bcrypt('nurhadi'),
         ],
         [
           'name' => 'Aldo',
           'email' => 'Aldo@gmail.com',
           'password' => bcrypt('aldo'),
         ]
        ]);
    }
}
