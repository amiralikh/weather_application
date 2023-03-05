<?php

namespace App\Repository;

use App\Models\User;

class UserRepo
{
    public function showAllUsers(): \Illuminate\Database\Eloquent\Collection|array
    {
        return User::query()->select('id','name','latitude','longitude')->get();
    }

    public function showAllUsersForFront()
    {
        return User::with('weather')->select('id','name','email')->get();
    }
}
