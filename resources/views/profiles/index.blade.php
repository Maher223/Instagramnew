@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-3 p-5 d-flex">
            <div style="width: 150px; height: 150px; overflow: hidden; border-radius: 50%;">
                <img src="{{ ($user->profile->profileImage()) }}" style="width: 100%; height: auto;">
            </div>
        </div>
        <div class="col-9 pt-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{ $user->username }}test{{$follows}}</div>
{{--@dump($follows);--}}
                    @if(Auth::check() && Auth::user()->id !== $user->id)
                        <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                    @endif
                </div>
                @can('update', $user->profile)
                    <div class="float-end"><a href="/p/create" style="text-decoration: none;">Nieuwe post</a></div>
                @endcan
            </div>
            @can('update', $user->profile)
                <a href="/profile/{{$user->id}}/edit" style="text-decoration: none;">Edit profiel</a>
            @endcan
            <div class="d-flex">
                <div style="padding-right: 4rem;">
                    <strong>{{$postCount}}</strong>
                    @if($user->posts->count() == 0)
                        Berichten
                    @elseif($user->posts->count() == 1)
                        Bericht
                    @else
                        Berichten
                    @endif
                </div>
                <div style="padding-right: 4rem;"><strong>{{$followersCount}}</strong> Volgers</div>
                <div style="padding-right: 4rem;"><strong>{{$followingCount}}</strong> Volgend</div>
            </div>
            <div class="pt-2" style="font-weight: bold;">{{ $user->profile->title }}</div>
            <div>{{$user->profile->description}}</div>
        </div>
    </div>
    <div class="row pt-5 ">
        @foreach($user->posts as $post)
            <div class="col-4">
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" class="w-100 pt-3">
                </a>
            </div>
        @endforeach

{{--        <div class="col-4">--}}
{{--            <img src="/images/foto3.jfif" class="w-100">--}}
{{--        </div>--}}
{{--        <div class="col-4">--}}
{{--            <img src="/images/foto1.jfif" class="w-100">--}}
{{--        </div>--}}
{{--        <div class="col-4">--}}
{{--            <img src="/images/foto2.jfif" class="w-100">--}}
{{--        </div>--}}
    </div>
</div>
@endsection
