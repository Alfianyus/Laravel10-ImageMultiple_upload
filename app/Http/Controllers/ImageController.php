<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ImageController extends Controller
{
    public function index(): view
    {
        return view('image');
    }

    public function ImageUpload(Request $request)
    {
        $request->validate([
            'image.*' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:5120',

        ]);

        foreach ($request->image as $value) {
            $imageName = time() . '_' . $value->getClientOriginalName();
            $value->move(public_path('images'), $imageName);
            $imageNams[] = $imageName;
        }

        return redirect()->back()->withSuccess('you have successfully upload image')->with('image', $imageNams);
    }
}
