<?php

namespace App\Repository;

use Illuminate\Support\Facades\Http;
use PHPUnit\Util\Exception;

class WeatherFetcher
{
    public function fetch($lat, $lon)
    {
        $api_key = 'c5e1b031a7e3b0f55a32501c6b2d0598';
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather?lat=" . $lat . "&lon=" . $lon . "&appid=" . $api_key . "&units=metric");

        if (!$response->ok()) {
            throw new Exception('Failed to fetch weather data: ' . $response->status());
        }

        $data = $response->json();
        if ($data['cod'] !== 200) {
            throw new Exception('Failed to fetch weather data: ' . $data['cod']);
        }

        return $data;
    }
}
