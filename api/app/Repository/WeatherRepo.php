<?php

namespace App\Repository;

use App\Models\UserWeather;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WeatherRepo
{
    private $weatherFetcher;
    private $userWeatherRepository;

    public function __construct(WeatherFetcher $weatherFetcher, UserWeatherRepo $userWeatherRepository)
    {
        $this->weatherFetcher = $weatherFetcher;
        $this->userWeatherRepository = $userWeatherRepository;
    }

    public function seedFromApi($users): void
    {
        foreach ($users as $user) {
            try {
                $data = $this->weatherFetcher->fetch($user->latitude, $user->longitude);
                $this->userWeatherRepository->storeData($user, $data);
            } catch (\Exception $e) {
                Log::error('Failed to fetch weather data for user ' . $user->id . ': ' . $e->getMessage());
            }
        }
    }
}
