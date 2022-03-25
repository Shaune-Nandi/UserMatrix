@extends('layouts.app')


@section('title', 'Dashboard')

@section('body')

        {{ session('success') }}, {{ auth()->user()->first_name }}
    

    @section('alert_success')
        @if(session('success'))
            {{ session('success') }}
        @endif
    @endsection

    




    <div class="text-4xl">
        Dashboard User Matrix

    </div>
    <a href="/roles">show roles</a>

@endsection
