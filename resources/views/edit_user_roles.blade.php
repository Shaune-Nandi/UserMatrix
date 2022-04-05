@extends('layouts.app')

@section('title', 'Edit user roles')

@section('body')

    <div class="grid">
        <form action="/user/roles/{user}/save" method="POST" class="justify-self-center bg-gray-100 rounded-md w-1/2 mt-5 mx-5 px-5 py-5">
            @csrf
            <h3 class="text-2xl text-center mb-3">Edit {{ $user->first_name }} {{ $user->last_name }}'s permissions</h3>

            <input type="number" name="user_id" id="id" readonly hidden value="{{ $user->id }}">
            
                <fieldset class="mt-3">
                    <legend class="text-sm text-center mb-10">Select the roles you want to give {{ $user->first_name }}:</legend>
                    <div class="flex justify-center">
                        @foreach($roles as $role)            
                            <div class="flex items-center ml-10 mb-1">
                                <input name="role[]" id="{{ $role->slug }}" value="{{ $role->id }}" aria-describedby="checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="role[]" class="ml-2 text-sm font-sm text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                            </div>                
                        @endforeach
                    </div>
                </fieldset>


            <div class="relative z-0 mb-6 mt-8 group">
                <center>
                    <button type="submit" class="justify-items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Save & finish
                    </button>
                </center>
            </div>
        </form>
    </div>

@endsection
