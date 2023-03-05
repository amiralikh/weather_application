<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\WeatherRepo;
use App\Repository\UserRepo;
use Illuminate\Support\Facades\App;

class WeatherApiController extends Controller
{
    public function seeding()
    {
        $users = App::make(UserRepo::class)->showAllUsers();
        App::make(WeatherRepo::class)->seedFromApi($users);
    }
}
