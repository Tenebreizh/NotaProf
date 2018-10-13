<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * Test to see if we retrieve more than 1 category
     *
     * @return void
     */
    public function testIndexCategory()
    {
        $response = $this->get('/api/categories');

        $response->assertStatus(200);
    }

    /**
     * Test to see if we retrieve a category
     *
     * @return void
     */
    public function testShowCategory()
    {
        $response = $this->get('/api/categories/1');

        $response->assertJson([
            "id" => 1,
            "name" => "Niveau"
        ]);
    }

    /**
     * Test to see if we retrieve an error message if we use an impossible id
     *
     * @return void
     */
    public function testShowCategoryFail()
    {
        $response = $this->get('/api/categories/998');

        $response->assertJson([
            "message" => "error",
        ]);
    }
}
