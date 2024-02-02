<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
{
    public function getUsersWithDomicilio()
    {
        $users = User::with('userDomicilio')->get()->map(function ($user) {
            $user->edad = Carbon::parse($user->fecha_nacimiento)->age;
            return $user;
        })->toArray();

        return $users;
    }
}