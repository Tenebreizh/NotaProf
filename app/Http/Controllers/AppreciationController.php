<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Appreciation;
use App\Category;

class AppreciationController extends Controller
{
      
    /**
     * Store base appreciations in the database
     *
     * @return void
     */
    public static function storeAppreciations()
    {
        // Get the json file
        $json = file_get_contents(base_path('database/data/appreciations.json'));
        $data = json_decode($json, true);

        foreach ($data as $category) 
        {

            // Create a category
            $new_cat = Category::create([
                'name' => $category['name'],
            ]);

            foreach ($category['appreciations'] as $appreciation) 
            {
                // For each object create an appreciation
                Appreciation::create([
                    'level' => $appreciation['level'],
                    'content' => $appreciation['content'],
                    'category_id' => $new_cat->id
                ]);
            }
        }
    }
}
