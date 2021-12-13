<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    // https://laravel.com/docs/8.x/eloquent-relationships#defining-relationships
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
