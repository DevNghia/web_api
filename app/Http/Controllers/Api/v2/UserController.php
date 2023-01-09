<?php

namespace App\Http\Controllers\Api\v2;

use App\Http\Resources\v2\UserResource;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function show(User $user)
    {
        return UserResource::collection($user::all());;
    }
}
