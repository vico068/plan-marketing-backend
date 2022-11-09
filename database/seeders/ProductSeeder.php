<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
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
                "name" => "Geladeira Brastemp Frost Free Duplex 375 litros cor Inox com Espaço Adapt - BRM45JK",
                "slug" => Str::slug("Geladeira Brastemp Frost Free Duplex 375 litros cor Inox com Espaço Adapt - BRM45JK"),
                "description" => "A Geladeira Brastemp Frost Free Duplex BRM45 375 litros conta com design sofisticado e grande capacidade para armazenar os alimentos. Vem com Painel Eletrônico, Espaço Adapt, compartimento Latas e Long Necks e compartimento Extrafrio.",
                "price" => 2000.00,
                "category_id" => 1,
                "thumbnail_url" => "https://brastemp.vtexassets.com/arquivos/ids/231300/geladeira-brastemp-brm45jk-frontal-1.jpg",
                "active" => true
            ],
            [
                "name" => "Geladeira Consul Frost Free 342 litros cor Inox com Gavetão Hortifruti - CRB39AK",
                "slug" => Str::slug("Geladeira Consul Frost Free 342 litros cor Inox com Gavetão Hortifruti - CRB39AK"),
                "description" => "Uma grande Frost Free para cozinhas não tão grandes assim. Já que não existe formação de gelo nas paredes da geladeira, também não tem bagunça na hora de limpar. Ainda bem.",
                "price" => 3000.00,
                "category_id" => 2,
                "thumbnail_url" => "https://consul.vtexassets.com/arquivos/ids/225203-1600-auto?v=637938611258200000&width=1600&height=auto&aspect=true",
                "active" => true
            ],
            [
                "name" => "Geladeira/Refrigerador Top Freezer cor Inox 382L Electrolux (TF42S)",
                "slug" => Str::slug("Geladeira/Refrigerador Top Freezer cor Inox 382L Electrolux (TF42S)"),
                "description" => "Espaçoso, simplifica a organização, além de facilitar na visualização de tudo que está no seu interior.",
                "price" => 4000.00,
                "category_id" => 3,
                "thumbnail_url" => "https://electrolux.vtexassets.com/arquivos/ids/213940-1200-1200?v=637719955682770000&width=1200&height=1200&aspect=true",
                "active" => true
            ],
        ];

        foreach ($products as $product) {
            Product::firstOrCreate(["name" => $product["name"]], $product);
        }
    }
}
