@extends('layouts')

@section('title')
    Register
@endsection

@section('content')

<div class="list-group">
    <form action="{{ route('register') }}" method="POST">
        {{ csrf_field() }}
        <input type="email" name="name" required>
        <input type="password" name="lastname" required>
        <input type="password" name="email" required>
        <input type="password" name="phone" required>
        <input type="password" name="password" required>
        <button type="submit">Submit</button>
    </form>
</div>

@endsection
