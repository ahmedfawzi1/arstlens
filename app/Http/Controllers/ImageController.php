<?php

namespace App\Http\Controllers;

use App\Category;
use App\Image;

class ImageController extends Controller
{
    public function index()
    {
        $image = Image::all();
        return view("images.index");
    }

    public function store(Request $request)
    {
        $fileds = $request->validate([
            "image_name" => "required",
            "image" => "required",
            "image_discription" => "required",
            "category_id" => "required",
        ]);
        // $image = new image;


        $request->file('image')->store('public/image');
        $image_name = $request->file('image')->hashName();
        $path = 'storage/images/' . $image_name;






        $data  = $request->all();
        $data['image'] = $path;
        $data['user_id'] = auth()->user()->id;
        $new_post  = image::create($data);









        return response()->json(array('data' => $new_post , 'success' => isset($new_post)));
    }

    public function create()
    {
        $all_categories = Category::all();
        return view('images.create', compact('all_categories'));

    }

    public function show($id)
    {
        $image = image::find($id);
        return view("images.show")->with("image", $image);
    }

    public function destroy($id)
    {
        $image = Image::find($id);
        $image->delete();
        return view("images.index")->with("DONE", "THE PICTURE HAS BEEN DELETED");
    }
}
