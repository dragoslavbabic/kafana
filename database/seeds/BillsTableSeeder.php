<?php

use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([[
        	'naziv' => 'Pivo',
        	'kolicina' => '2',
        	'cena' => '100',
        	'konobarid'=> '1',
        	'racunid'=> '1',
            'stoid'=> '1'
        ],[
			'naziv' => 'Rakija',
        	'kolicina' => '1',
        	'cena' => '80',
        	'konobarid'=> '1',
        	'racunid'=> '1',
            'stoid'=> '1'
        ],[
            'naziv' => 'KokaKola',
            'kolicina' => '2',
            'cena' => '100',
            'konobarid'=> '1',
            'racunid'=> '1',
            'stoid'=> '1'
        ],[
            'naziv' => 'KokaKola',
            'kolicina' => '2',
            'cena' => '100',
            'konobarid'=> '2',
            'racunid'=> '1',
            'stoid'=> '2'
        ]]);
    }
}
