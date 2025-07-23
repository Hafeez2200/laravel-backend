<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        return view('admin.images.index', ['images' => Image::all()]);
    }

    public function create()
    {
        return view('admin.images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        $path = $request->file('image')->store('images', 'public');

        Image::create([
            'name' => $request->input('name'),
            'file_path' => $path,
        ]);

        return redirect()->route('admin.images.index')->with('success', 'Image uploaded successfully.');
    }

    public function edit(Image $image)
    {
        return view('admin.images.edit', compact('image'));
    }

    public function update(Request $request, Image $image)
    {
        $request->validate([
            'name' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            // Delete old
            Storage::disk('public')->delete($image->file_path);
            // Store new
            $image->file_path = $request->file('image')->store('images', 'public');
        }

        $image->name = $request->input('name');
        $image->save();

        return redirect()->route('admin.images.index')->with('success', 'Image updated.');
    }

    public function destroy(Image $image)
    {
        Storage::disk('public')->delete($image->file_path);
        $image->delete();

        return redirect()->route('admin.images.index')->with('success', 'Image deleted.');
    }
}

