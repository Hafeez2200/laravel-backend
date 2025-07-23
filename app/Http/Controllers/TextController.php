<?php

// app/Http/Controllers/TextController.php
namespace App\Http\Controllers;

use App\Models\Text;
use App\Models\Language;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function index()
    {
        $texts = Text::with('translations.language')->get();
        return view('texts.index', compact('texts'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('texts.create', compact('languages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string|unique:texts,key',
            'translations' => 'required|array',
            'translations.*' => 'nullable|string',
        ]);

        $text = Text::create(['key' => $validated['key']]);

        foreach ($validated['translations'] as $lang_id => $value) {
            if ($value) {
                $text->translations()->create([
                    'language_id' => $lang_id,
                    'value' => $value
                ]);
            }
        }

        return redirect()->route('texts.index')->with('success', 'Text created successfully.');
    }

    public function edit(Text $text)
    {
        $languages = Language::all();
        $translations = $text->translations->pluck('value', 'language_id');
        return view('texts.edit', compact('text', 'languages', 'translations'));
    }

    public function update(Request $request, Text $text)
    {
        $validated = $request->validate([
            'key' => 'required|string|unique:texts,key,' . $text->id,
            'translations' => 'required|array',
            'translations.*' => 'nullable|string',
        ]);

        $text->update(['key' => $validated['key']]);

        foreach ($validated['translations'] as $lang_id => $value) {
            $text->translations()->updateOrCreate(
                ['language_id' => $lang_id],
                ['value' => $value]
            );
        }

        return redirect()->route('texts.index')->with('success', 'Text updated successfully.');
    }

    public function destroy(Text $text)
    {
        $text->delete();
        return redirect()->route('texts.index')->with('success', 'Text deleted.');
    }
}
