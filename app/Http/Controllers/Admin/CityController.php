<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Language;
use App\Models\CityTranslation;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::with('translations.language')->get();
        return view('admin.cities.index', compact('cities'));
    }

    public function create()
    {
        $languages = Language::all();
        return view('admin.cities.create', compact('languages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'key' => 'required|unique:cities',
            'name' => 'required|array',
            'name.*' => 'required|string',
        ]);

        $city = City::create(['key' => $request->key]);

        foreach ($request->name as $lang_id => $name) {
            CityTranslation::create([
                'city_id' => $city->id,
                'language_id' => $lang_id,
                'name' => $name
            ]);
        }

        return redirect()->route('admin.cities.index')->with('success', 'City added.');
    }

    public function edit(City $city)
    {
        $languages = Language::all();
        $translations = $city->translations->pluck('name', 'language_id');
        return view('admin.cities.edit', compact('city', 'languages', 'translations'));
    }

    public function update(Request $request, City $city)
    {
        $request->validate([
            'name' => 'required|array',
            'name.*' => 'required|string',
        ]);

        foreach ($request->name as $lang_id => $name) {
            CityTranslation::updateOrCreate(
                ['city_id' => $city->id, 'language_id' => $lang_id],
                ['name' => $name]
            );
        }

        return redirect()->route('admin.cities.index')->with('success', 'City updated.');
    }

    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('admin.cities.index')->with('success', 'City deleted.');
    }
}
