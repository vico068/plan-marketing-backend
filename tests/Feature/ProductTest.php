<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    /**
     * List products test.
     *
     * @return void
     */

    public $firstProduct;


    public function test_list_products()
    {
        $response = $this->get('/api/products');
        $response->assertStatus(200);
    }



    public function test_create_product()
    {
        $data = [
            "name" => "Geladeira Brastemp Frost Free Duplex 375 litros cor Inox com Espaço Adapt - BRM45JSDSDSD",
            "slug" => Str::slug("Geladeira Brastemp Frost Free Duplex 375 litros cor Inox com Espaço Adapt - BRMSDSDSDSDS45JK"),
            "description" => "A Geladeira Brastemp Frost Free Duplex BRM45 375 litros conta com design sofisticado e grande capacidade para armazenar os alimentos. Vem com Painel Eletrônico, Espaço Adapt, compartimento Latas e Long Necks e compartimento Extrafrio.",
            "price" => 2000.00,
            "category_id" => 1,
            "thumbnail_url" => "https://brastemp.vtexassets.com/arquivos/ids/231300/geladeira-brastemp-brm45jk-frontal-1.jpg",
            "active" => true
        ];
        $response = $this->post('/api/products',$data);
        $passed = $response->getStatusCode() == 201 || $response->getStatusCode() == 302 ;
        $this->assertTrue($passed);
    }

}
