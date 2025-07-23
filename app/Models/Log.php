<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = ['user_id', 'image_url', 'clicked_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
