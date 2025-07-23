<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['key'];

    public function translations()
    {
        return $this->hasMany(CityTranslation::class);
    }
}
