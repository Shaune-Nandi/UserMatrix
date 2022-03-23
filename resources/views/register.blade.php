@extends('layouts.app')

@section('title', 'register')

@section('body')
    <form action="/register" method="POST">
        @csrf
        <div class="flex justify-center border-2">
            <h3>Register</h3>
            <input class="border my-2 mx-2" type="text" name="name" placeholder="Name">
            <input class="border my-2 mx-2" type="text" name="username" placeholder="Username">
            <input class="border my-2 mx-2" type="email" name="email" placeholder="Email">
            <input class="border my-2 mx-2" type="password" name="password" placeholder="Password">
            <button class="btn bg-blue-500" type="submit">Register</button>
        </div>
    </form>
@endsection
