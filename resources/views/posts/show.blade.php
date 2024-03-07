@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 text-center">
                <img src="/storage/{{ $post->image }}" class="img-fluid">
            </div>
            <div class="col-4">
                <div class="d-flex align-items-center mb-3">
                    <div class="me-3" style="width: 50px; height: 50px; overflow: hidden; border-radius: 50%;">
                        <img src="{{ $post->user->profile->profileImage() }}" class="img-fluid">
                    </div>
                    <div>
                        <div>
                            <a href="/profile/{{ $post->user->id }}" class="text-dark text-decoration-none fw-bold">{{ $post->user->username }}</a>
{{--                            <a href="#" class="ps-3">Volgen</a>--}}
                        </div>
                    </div>
                </div>
                <hr>
                <p>
                    <span class="text-dark font-weight-bold">
                        <a href="/profile/{{ $post->user->id }}" class="text-dark text-decoration-none fw-bold">{{ $post->user->username }}</a>
                    </span> {{ $post->caption }}
                </p>
            </div>
        </div>
    </div>
@endsection
