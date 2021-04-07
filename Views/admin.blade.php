@extends('layouts.app')

@section('title')
    Admin
@endsection

@section('content')

<div class="container">
    @foreach($users as $user)
        <div>
            <form method="post" action="{{ route('add_photo', $id->id) }}">
                {{ csrf_field() }}
                    <p>{{ $user->name }}</p>
                    <p>{{ $user->tarif }}</p>
                    <p>{{ $user->aboniments }}</p>
                    <input type="file" name="images[]" multiple>
                <button type="submit" class="btn">Add photo</button>
            </form>
        </div>
    @endforeach
</div>

@endsection