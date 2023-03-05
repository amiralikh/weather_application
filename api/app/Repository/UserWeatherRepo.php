<?php

namespace App\Repository;

use App\Models\UserWeather;

class UserWeatherRepo
{
    public function storeData($user,$data): void
    {
        UserWeather::query()->updateOrCreate([
            'user_id' => $user->id
        ],[
            'name' => $data['name'],
            'weather_main' => $data['weather'][0]['main'],
            'weather_description' => $data['weather'][0]['description'],
            'temp' => $data['main']['temp'],
            'feel_temp' => $data['main']['feels_like'],
            'min_temp' => $data['main']['temp_min'],
            'max_temp' => $data['main']['temp_max'],
            'pressure' => $data['main']['pressure'],
            'humidity' => $data['main']['humidity'],
            'visibility' => $data['visibility'],
            'speed_wind' => $data['wind']['speed'],
        ]);
    }
}
