<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWeather extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'weather_main',
        'weather_description',
        'temp',
        'feel_temp',
        'min_temp',
        'max_temp',
        'pressure',
        'humidity',
        'visibility',
        'speed_wind',
    ];

    public function weather(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UserWeather::class, 'user_id');
    }

}
