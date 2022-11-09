<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CategoryTest extends TestCase
{
    /**
     * List categories test.
     *
     * @return void
     */



    public function test_list_categories()
    {
        $response = $this->get('/api/categories');
        $response->assertStatus(200);
    }


    public function test_create_categories()
    {
        $data = [
            "name" => "Brastemp",
            "description" => "Sem dúvida, Brastemp",
            "slug" => Str::slug("Brastemp"),
            "thumbnail_url" => "https://logodownload.org/wp-content/uploads/2017/04/brastemp-logo-0-2048x2048.png",
            "active" => true
        ];
        $response = $this->post('/api/categories',$data);
        $passed = $response->getStatusCode() == 201 || $response->getStatusCode() == 302 ;
        $this->assertTrue($passed);
    }
}
