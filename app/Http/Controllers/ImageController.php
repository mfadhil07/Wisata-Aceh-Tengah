<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class ImageController extends Controller
{

    public function index()
    {
        return view('admin.image');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'filenames' => 'required',
            'filenames.*' => 'image'
        ]);

        $files = [];
        if ($request->hasfile('filenames')) {
            foreach ($request->file('filenames') as $file) {
                $name = time() . rand(1, 50) . '.' . $file->extension();
                $file->move(public_path('files'), $name);
                $files[] = $name;
            }
        }

        $file = new File();
        $file->filenames = $files;
        $file->save();

        return back()->with('success', 'Images are successfully uploaded');
    }
}
