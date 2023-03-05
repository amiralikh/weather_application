<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repository\UserRepo;
use Illuminate\Http\JsonResponse;

class HomeController extends Controller
{
    /**
     * The UserRepo instance.
     *
     * @var UserRepo
     */
    private $userRepo;

    /**
     * Create a new HomeController instance.
     *
     * @param UserRepo $userRepo
     */
    public function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * Display a list of all users.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $users = $this->userRepo->showAllUsersForFront();
        return response()->json(['users' => $users], 200);
    }
}
