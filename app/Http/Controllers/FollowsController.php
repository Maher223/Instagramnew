<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class FollowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(User $user)
    {
//        dd('count.following.' . $user->id);
        Cache::forget('count.followers.' . $user->id);
        Cache::forget('count.following.' . $user->id);
        return auth()->user()->following()->toggle($user->profile);
    }
}
