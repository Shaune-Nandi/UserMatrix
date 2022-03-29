@extends('layouts.app')

@section('title', 'Permissions Table')

@section('body')
    @foreach($permission as $permission)

        {{ $permission }} <br><br>


    @endforeach
@endsection
