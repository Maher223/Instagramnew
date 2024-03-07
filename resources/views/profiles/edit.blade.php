@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/profile/{{$user->id}}" enctype="multipart/form-data" method="post">
        @csrf
        @method('PATCH')

        <div class="row">
            <div class="col-md-6 offset-md-3">

                <div class="row">
                    <h1>Edit Profiel</h1>
                </div>
                <div class="row mb-3">
                    <label for="title" class="col-md-4 col-form-label">Titel</label>
                    <input id="title"
                           type="text" class="form-control @error('title') is-invalid @enderror"
                           name="title"
                           value="{{ old('title') ?? $user->profile->title }}"
                           autocomplete="title" required autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label">omschrijving</label>
                    <input id="description"
                           type="text" class="form-control @error('description') is-invalid @enderror"
                           name="description"
                           value="{{ old('description') ?? $user->profile->description }}"
                           autocomplete="description" required autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="row">
                    <label for="image" class="col-md-4 col-form-label">Profile afbeelding</label>
                    <input type="file" class="form-control-file" id="image" name="image">

                    @error('image')
                    <strong>{{ $message }}</strong>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row pt-4 pb-4">
            <div class="col-md-6 offset-md-3">
                <button class="btn btn-primary">Profiel opslaan</button>
            </div>
        </div>
    </form>
</div>
@endsection
