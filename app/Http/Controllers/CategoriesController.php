<?php

namespace App\Http\Controllers;

use App\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $all_categories = Category::all();
        return view('images.create', compact('all_categories'));
        // return view('images.create', compact('all_categories'));
    }

    public function store(Request $request)
    {
        $fileds = $request->validate([
            "name" => "required",
        ]);
        $categories = new Categories;
        $categories->name = $request->name;
    }

    public function create()
    {
        return view("categories.create");
    }

    public function show($id)
    {
        $categories = Categories::find($id);
        return view("categories.show")->with("Categories", $categories);}

    public function destroy($id)
    {
        $categories = Categories::find($id);
        $categories->delete();
        return view("categories.index")->with("DONE", "CATEGORIES HAVE BEEN DELETED");
    }
}
