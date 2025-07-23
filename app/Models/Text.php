<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Text extends Model
{
    protected $fillable = ['key'];

    public function translations()
    {
        return $this->hasMany(TextTranslation::class);
    }

    public function getTranslation($langCode)
    {
        return $this->translations()->whereHas('language', function ($query) use ($langCode) {
            $query->where('code', $langCode);
        })->first();
    }
}
