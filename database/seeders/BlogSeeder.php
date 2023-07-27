<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\CateBlog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $img = [
            'http://127.0.0.1:8000/uploads/1690384547_blog-1.jpg',
            'http://127.0.0.1:8000/uploads/1690384564_blog-2.jpg',
            'http://127.0.0.1:8000/uploads/1690384584_blog-3.jpg'
        ];
        $faker = Faker::create();
        foreach (CateBlog::all() as $cateblog){
            foreach (range(1, 10) as $item){
                $summary = $faker->text;
                if (mb_strlen($summary) > 100) {
                    $summary = mb_substr($summary, 0, 100);
                    $lastSpace = mb_strrpos($summary, ' ');
                    if ($lastSpace !== false) {
                        $summary = mb_substr($summary, 0, $lastSpace);
                    }
                }
                $views = array_rand([202,233,243,537,643]);
                Blog::create ([
                    'id_blog' => $cateblog->id,
                    'title' => $cateblog->name . "" . $item,
                    'summary' => $summary,
                    'content' => $faker->Text,
                    'views' => $views,
                    'img' => $img[rand(0, 2)]
                ]);
            };
        }
    }
}
