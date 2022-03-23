@extends('layouts.app')

@section('title', 'Dashboard')

@section('body')

    @auth
        <a href="/logout">Logout</a> 
        {{ auth()->user()->name }}
    @endauth

    <div class="text-4xl">Dashboard User Matrix</div>

@endsection
