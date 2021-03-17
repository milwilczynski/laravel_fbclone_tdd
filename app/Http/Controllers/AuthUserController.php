<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\User as ResourcesUser;

class AuthUserController extends Controller
{
    public function show()
    {
        return new ResourcesUser(auth()->user());
    }
}
