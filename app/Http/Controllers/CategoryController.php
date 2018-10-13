<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{

    /**
     * Get all Categories
     *
     * @return Category
     */
    public function index()
    {
        return Category::all();
    }

    /**
     * Get specific Category
     *
     * @param int $id
     * @return Category $category
     */
    public function show($id)
    {
        try
        {
            $category = Category::findOrFail($id);
            return $category;
        } 
        catch(\Exception $e) 
        {
            return response()->json([
                'message' => 'error',
                'description' => 'Not found...'
            ], 404);
        }
    }
}
