@extends('layouts.app')

@section('title', 'Roles Table')

@section('body')
    <a href="/roles/create">create a new role</a> <br>
    @foreach($roles as $roles)

        {{ $roles }} <br><br>


    @endforeach
@endsection
