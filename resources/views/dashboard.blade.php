@extends('layouts.app')


@section('title', 'Dashboard')

@section('body')

    @section('alert_success')
        @if(session('success'))
            {{ session('success') }}
        @endif
    @endsection

    <div class="text-4xl">
        Dashboard User Matrix

    </div>
    <br>
    <a href="/roles">Roles</a>
    <br>
    <a href="/permissions">Permissions</a>


@endsection
