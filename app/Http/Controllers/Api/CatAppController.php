<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Text;
use App\Models\Setting;
use App\Models\Log;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CatAppController extends Controller
{
    public function getTexts()
    {

        return response()->json(Text::all()->pluck('value', 'key'));
    }

    public function getSettings()
    {
        return response()->json(Setting::all()->pluck('value', 'key'));
    }

    public function logClick(Request $request)
    {
        Log::create([
            'user_id' => $request->input('user_id'),
            'image_url' => $request->image_url,
            'clicked_at' => now(),
        ]);

        return response()->json(['message' => 'Logged']);
    }

    public function getImages()
    {
        $images = Image::all()->map(function ($image) {
            return [
                'id' => $image->id,
                'name' => $image->name,
                'url' => asset('storage/' . $image->file_path),
            ];
        });

        return response()->json([
            'success' => true,
            'data' => $images
        ]);
    }
}
