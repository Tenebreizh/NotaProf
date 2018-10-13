<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AppreciationTest extends TestCase
{
    use DatabaseTransactions;
    
    /**
     * Test to see if we retrieve more than 1 appreciation
     *
     * @return void
     */
    public function testIndexAppreciation()
    {
        $response = $this->get('/api/appreciations');

        $response->assertStatus(200);   
    }

    /**
     * Test to see if we retrieve an appreciation
     *
     * @return void
     */
    public function testShowAppreciation()
    {
        $response = $this->get('/api/appreciations/1');

        $response->assertJson([
            "id" => 1,
            "content" => "Bilan décevant",
            "level" => "-",
            "category_id" => 1
        ]);
    }

    /**
     * Test to see if we retrieve an error message if we use an impossible id
     *
     * @return void
     */
    public function testShowAppreciationFail()
    {
        $response = $this->get('/api/appreciations/998');

        $response->assertJson([
            "message" => "error",
        ]);
    }

}
