<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([[
        	'naziv' => 'Pivo',
        	'cena' => '100'
        ],[
			'naziv' => 'Rakija',
        	'cena' => '80'
        ],[
			'naziv' => 'KokaKola',
        	'cena' => '120'
        ],[
			'naziv' => 'Kafa',
        	'cena' => '50'
        ],[
			'naziv' => 'Djus',
        	'cena' => '150'
        ],[
			'naziv' => 'KnjazMilos',
        	'cena' => '40'
        ],[
			'naziv' => 'VodaVoda',
        	'cena' => '30'
        ]]);
    }
}
