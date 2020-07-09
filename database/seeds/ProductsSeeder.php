<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Java Moss',
                'photo_url' => 'https://cf.shopee.co.id/file/24fcdacb4f4786969933682a08032d63',
                'price' => 3000,
                'description' => 'Java Moss memiliki nama ilmiah Taxiphyllum barbieri, merupakan salah satu jenis lumut yang paling produktif. Banyak ditemukan di wilayah Asia Tenggara, yaitu Vietnam dan Jepang. Vegetasi lumut Java Moss terdapat di sungai dan rawa-rawa, biasanya menempel pada batu dan kayu apung.',
            ],
            [
                'name' => 'Christmas Moss',
                'photo_url' => 'https://4.bp.blogspot.com/-rXsuonnwiQ0/WkBmYhdDUkI/AAAAAAAAAvc/9a7HjV0TynsjmPaTzIQeURA8G3P1do8GwCK4BGAYYCw/s1600/Christmas-Moss-aquascapebatang3.jpg',
                'price' => 8000,
                'description' => 'Christmas moss atau biasa disebut Xmas Moss adalah lumut air yang tersebar luas di Asia tropis termasuk India, Jepang, Filipina dan Thailand. Tanaman ini tumbuh di tepi sungai yang teduh, anak sungai dan di tanah hutan yang lembab. Xmas Moss digunakan di aquascape sebagai tanaman foreground. Popularitasnya meningkat dari hari ke hari di kalangan penggemar akuarium.',
            ],
            [
                'name' => 'Taiwan Moss',
                'photo_url' => 'https://cdn.webshopapp.com/shops/39374/files/80711018/taiwan-moss.jpg',
                'price' => 4000,
                'description' => 'Taiwan moss memiliki nama lain taxiphyllum alternans salah satu tanaman yang tidak membutuhkan co2 tambahan dengan kebutuhan cahaya low medium atau semua jenis penerangan. Tanaman ini dapat hidup di bawah 30 derajat.',
            ]
        ];

        DB::table('products')->insert($products);
    }
}
