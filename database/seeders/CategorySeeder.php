<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        $categories = [
            [
                "name" => "Brastemp",
                "description" => "Sem dúvida, Brastemp",
                "slug" => Str::slug("Brastemp"),
                "thumbnail_url" => "https://logodownload.org/wp-content/uploads/2017/04/brastemp-logo-0-2048x2048.png",
                "active" => true
            ],
            [
                "name" => "Consul",
                "description" => "Bem Pensado",
                "slug" => Str::slug("Consul"),
                "thumbnail_url" => "https://logodownload.org/wp-content/uploads/2014/04/consul-logo-1.png",
                "active" => true
            ],
            [
                "name" => "Electrolux",
                "description" => "Sem dúvida, Brastemp",
                "slug" => Str::slug("Electrolux"),
                "thumbnail_url" => "https://logodownload.org/wp-content/uploads/2017/04/electrolux-logo-2.png",
                "active" => true
            ],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(["name" => $category["name"]], $category);
        }
    }
}
