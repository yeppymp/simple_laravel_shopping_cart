<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carts')->insert(
            [
                'id_user' => 1,
                'total' => 11000
            ]
        );
    }
}
