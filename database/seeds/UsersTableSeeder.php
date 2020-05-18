<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
        	'name' => 'Administrator',
        	'email' => 'administrator@caffesofting.rs',
        	'password' => Hash::make('administrator'),
        	'admin' => '1'
        ],[
			'name' => 'Konobar',
        	'email' => 'konobar@caffesofting.rs',
        	'password' => Hash::make('konobar'),
        	'admin' => '0'
        ]]);
    }
}
