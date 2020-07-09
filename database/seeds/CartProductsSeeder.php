<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CartProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart_products = [
            [
                'id_cart' => 1,
                'id_product' => 2,
                'qty' => 1
            ],
            [
                'id_cart' => 1,
                'id_product' => 1,
                'qty' => 1
            ]
        ];

        Db::table('cart_products')->insert($cart_products);
    }
}
