<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Helpers;
use App\Categories;


class CategoriesController extends Controller
{
        public function showCategoriesDetails($id)
    {

        $category = Categories::where(function ($query) use ($id) {
            $query->where('id', $id);
        })->firstOrFail();

        return view('categoriesDetails', ['category' => $category]);
    }
}
