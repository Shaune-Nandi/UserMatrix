@extends('layouts.app')

@section('title', 'login')

@section('body')
    <form action="/login" method="POST">
        @csrf
        <div class="flex justify-center border-2">
            <h3 class="">Login</h3>
            <input class="border my-2 mx-2" type="text" name="username" placeholder="Username">
            <input class="border my-2 mx-2" type="password" name="password" placeholder="Password">
            <button class="btn bg-blue-500" type="submit">Login</button>
        </div>
    </form>
@endsection
