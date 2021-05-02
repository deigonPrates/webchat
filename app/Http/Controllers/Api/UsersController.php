<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::all();

        return response()->json([
            'users' => $users
        ], Response::HTTP_OK);
    }
}
