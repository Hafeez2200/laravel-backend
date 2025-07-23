<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Text;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function getContent($lang)
    {
        $texts = Text::with(['translations.language'])->get();

        $formattedTexts = [];

        foreach ($texts as $text) {
            $translation = $text->translations->firstWhere('language.code', $lang);

            if ($translation) {
                $formattedTexts[] = [
                    'key' => $text->key,
                    'value' => $translation->value,
                ];
            }
        }

        return response()->json(['texts' => $formattedTexts]);
    }
}
