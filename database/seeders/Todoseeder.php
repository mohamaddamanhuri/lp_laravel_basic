<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class Todoseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([ 
        'Title' => 'Solat',
        'Description' => 'Solat 5 Waktu',
        'created_at'=> now(),
        'updated_at'=>now()

        ]);
    }
}
