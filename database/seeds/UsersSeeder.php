<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Yeppy Mangun Puspitajudin',
            'email' => 'yeppymp@gmail.com',
            'password' => Hash::make('yeppymp'),
        ]);
    }
}
