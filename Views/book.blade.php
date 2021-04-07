@extends('layouts.app')

@section('title')
    Book
@endsection

@section('content')

    <div class="container">
        @if(session()->has('message'))
            <div>
                {{ session()->get('message') }}
            </div>
        @endif
        <div>
            <form method="post" action="{{ route('create') }}" onsubmit="return checkForm(this)">
                {{ csrf_field() }}
                <input type="name" name="name" required>
                <input type="email" name="email" required>
                <textarea name="message" cols="40" rows="4"></textarea>
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function checkForm(form) {
            var name = form.name.value;
            var n = name.match(/^[A-Za-zА-Яа-я ]*[A-Za-zА-Яа-я ]+$/);
            if (!name) {
                alert("Sorry, name is wrong!");
                return false;
            }
            var email = form.email.value;
            var m = email.match(/^[A-Za-z0-9][A-Za-z0-9\._-]*[A-Za-z0-9_]*@([A-Za-z0-9]+([A-Za-z0-9-]*[A-Za-z0-9]+)*\.)+[A-Za-z]+$/);
            if (!m) {
                alert("Sorry, email is wrong!");
                return false;
            }
            return true;
        }
    </script>

@endsection