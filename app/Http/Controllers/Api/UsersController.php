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
        $users = User::where('id', '<>', auth()->user()->id)->get();

        return response()->json([
            'users' => $users
        ], Response::HTTP_OK);
    }

    public function show(User $user): JsonResponse
    {
        return response()->json(['user'=>$user], Response::HTTP_OK);
    }
}
