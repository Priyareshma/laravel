<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(array(
        	array(
 'name' => "Steve",
 'email' => 'steve@gmail.com',
 'password' => 'secret',
        	),
        	array(
 'name' => "Laura",
 'email' => 'laura@gmail.com',
 'password' => 'secret',
        	)
        ));
    }
}
