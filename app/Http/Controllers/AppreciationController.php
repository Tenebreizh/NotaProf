<?php

namespace App\Http\Controllers;

use App\Appreciation;
use App\Category;
use Illuminate\Http\Request;

class AppreciationController extends Controller
{
    /**
     * Store base appreciations in the database.
     *
     * @return void
     */
    public static function storeAppreciations()
    {
        // Get the json file
        $json = file_get_contents(base_path('database/data/appreciations.json'));
        $data = json_decode($json, true);

        foreach ($data as $category) {
            // Create a category
            $new_cat = Category::create([
                'name'      => $category['name'],
                'protected' => true,
            ]);

            foreach ($category['appreciations'] as $appreciation) {
                // For each object create an appreciation
                Appreciation::create([
                    'level'       => $appreciation['level'],
                    'content'     => $appreciation['content'],
                    'category_id' => $new_cat->id,
                    'protected'   => true,
                ]);
            }
        }
    }

    public static function reset()
    {
        $appreciations = Appreciation::all()->where('protected', true);
        $categories = Category::all()->where('protected', true);

        // Delete all system base appreciations
        foreach ($appreciations as $appreciation) {
            $appreciation->delete();
        }

        // Delete all system base categories
        foreach ($categories as $category) {
            $category->delete();
        }

        // Re-populate the database
        self::storeAppreciations();

        // Return back with flash message
        flash('Les appréciations ont bien été réinitialisées !')->success();

        return redirect()->back();
    }

    public function update(Request $request, Appreciation $appreciation)
    {
        // Update fields
        $appreciation->content = $request->content;
        $appreciation->level = $request->level;
        $appreciation->category_id = $request->category;

        // Save to database
        $appreciation->save();

        // Return back with flash message
        flash("L'appréciation a bien été mise à jour !")->success();

        return redirect()->back();
    }

    public function destroy(Appreciation $appreciation)
    {
        // Delete the appreciation
        $appreciation->delete();

        // Return back with flash message
        flash("L'appréciation a bien été supprimée !")->success();

        return redirect()->back();
    }
}
