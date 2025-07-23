<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;

class CityController extends Controller
{
    public function getCities($lang)
    {
        $cities = City::with(['translations.language' => function ($query) use ($lang) {
            $query->where('code', $lang);
        }])->get();

        $formatted = $cities->map(function ($city) {
            return [
                'key' => $city->key,
                'name' => $city->translations->first()?->name ?? $city->key,
            ];
        });

        return response()->json(['cities' => $formatted]);
    }
}
