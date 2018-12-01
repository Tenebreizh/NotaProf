<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Appreciation;

class AppreciationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Test the update of an appreciation
     *
     * @return void
     */
    public function testUpdateAppreciation()
    {
        // Get 2 different categories
        $category = factory('App\Category')->create();
        $category2 = factory('App\Category')->create();

        // Get appreciation
        $appreciation = factory('App\Appreciation')->create([
            'category_id' => $category->id,
        ]);

        // Update fields
        $appreciation->content = "New content";
        $appreciation->level = "+";
        $appreciation->category_id = $category2->id;

        // Save to database
        $appreciation->save();

        // Assert update went well
        $this->assertDatabaseHas('appreciations', [
            'content'     => 'New content',
            'level'       => '+',
            'category_id' => $category2->id,
        ]);
    }

    /**
     * Test the delete of an appreciation
     *
     * @return void
     */
    public function testDeleteAppreciation()
    {
        // Get category
        $category = factory('App\Category')->create();

        // Get appreciation
        $appreciation = factory('App\Appreciation')->create([
            'category_id' => $category->id,
        ]);

        // Delete appreciation
        $appreciation->delete();

        // Assert delete went well
        $this->assertDatabaseMissing('appreciations', [
            'content'     => $appreciation->content,
            'level'       => $appreciation->level,
            'category_id' => $category->id,
        ]);
    }


}
