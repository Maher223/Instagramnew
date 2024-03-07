<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

//use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    public function index(User $user)
    {
        $follows = (auth()->user()) ? auth()->user()->following->contains($user->profile->id) : false;


        $postCount = Cache::remember
        (
            'count.posts.' . $user->id,
            now()->addSeconds(30),
            function () use ($user) {
                return $user->posts->count();
            }
        );
        $followersCount = Cache::rememberForever
        (
            'count.followers.' . $user->id,
            function () use ($user)
            {
                return $user->profile->followers->count();
            }
        );

//        Cache::flush();

        $followingCount = Cache::rememberForever
        (
            'count.following.' . $user->id,
            function () use ($user)
            {
//                dump('uit database');
                return $user->following->count();
            }
        );

//        dump($user->following->count());
//        dump($followingCount);
////        dd('count.following.' . $user->id);
//    dd($follows);
        return view
        ('profiles.index', [
                'user' => $user,
                'follows' => $follows,
                'postCount' => $postCount,
                'followersCount' => $followersCount,
                'followingCount' => $followingCount,
            ]
        );
    }

    public function edit(User $user)
    {
        $this->authorize('update', $user->profile);

        return view('profiles.edit', [
            'user' => $user,
        ]);
    }
    public function update(User $user)
    {
        $this->authorize('update', $user->profile);

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => '',
        ]);

        if (\request('image')){
            $imagePath = request('image')->store('profile', 'public');

            $imageArray = ['image' => $imagePath];
        }

        auth()->user()->profile->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        return redirect("/profile/{$user->id}");
    }
}
