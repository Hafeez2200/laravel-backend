<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextTranslation extends Model
{
    protected $fillable = ['text_id', 'language_id', 'value'];

    public function text()
    {
        return $this->belongsTo(Text::class);
    }

    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
