<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::all();
        return view("user.index");
    }

    public function create()
    {
        return view("user.index");
    }

    public function store(Request $Request)
    {
        $fileds = $request->validate([
            "name" => "required",
            "email" => 'required||unique:users',
            "password" => "required",
            "image" => "required",
        ]);
        $user = new user;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;

        //image code
        $allImageData = $request->user("image");
        $Image_name = $allImageData->getClientOriginalName();
        $allImageData->move(public_path() . "/image/", $Image_name);

        $user->user = $Image_name;
        $user->save();

        return redirect()->back()->with("done", "Uploaded Image Done");
    }

    public function show($id)
    {
        $Image = file::find($id);
        return view("user.show")->with("Image", $Image);
    }

    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return view("user.index")->with("done", "Delete Image Done");
    }
}
