<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $img = [
            '/public/uploads/1689443636_hatdiem.webp',
            '/public/uploads/1689412535_02.jpg',
            '/public/uploads/1689412771_3.jpg',
        ];

        foreach ( Category::all() as $category){
            foreach (range(1, 10) as $item){
                $number = rand(10, 200);
                $faker = Faker::create();
                $price = rand(500000, 5000000);
                $promotional_price = rand(500000, 5000000);
                $hot = [0,1];
                $rate = rand(4, 5);
                $view = array_rand([202,233,243,537,643]);
                Product::create([
                    'id_cate' =>  $category->id,
                    'name_pr' =>  $category->name . " " . $item,
                    'img' =>  $img[rand(0, 2)],
                    'price' => $price,
                    'promotional_price' =>  $promotional_price,
                    'number' => $number,
                    'status' =>  1,
                    'description' =>  $faker->Text,
                    'hot' => array_rand($hot),
                    'rate' => $rate,
                    'view' => $view
                ]);
            }
        }
    }
}
