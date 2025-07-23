<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    public function create()
    {
        return view('languages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'code' => 'required|string|max:5|unique:languages,code',
        ]);

        Language::create($request->only('name', 'code'));

        return redirect()->route('languages.index')->with('success', 'Language added successfully.');
    }

    public function destroy(Language $language)
    {
        // Check if this language is used in any translations
        $isUsed = \App\Models\TextTranslation::where('language_id', $language->id)->exists();

        if ($isUsed) {
            return redirect()->route('languages.index')->with('error', 'Cannot delete language. It is used in some text translations.');
        }

        $language->delete();

        return redirect()->route('languages.index')->with('success', 'Language deleted successfully.');
    }
}
