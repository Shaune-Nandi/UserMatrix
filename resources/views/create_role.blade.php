@extends('layouts.app')

@section('title', 'Create new role')

@section('body')
    <div class="grid">
        <form action="/roles/create" method="POST" class="justify-self-center bg-gray-100 rounded-md w-2/3 mt-5 mx-5 px-5 py-5">
            @csrf
            <h3 class="text-2xl ml-10 mb-6">Create new role</h3>
            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="name" id="name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="name" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Role Name</label>
            </div>

            <div class="relative z-0 mb-6 w-full group">
                <input type="text" name="slug" id="slug" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required="">
                <label for="slug" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Slug</label>
            </div>

            <fieldset class="mt-10">
                <legend class="text-sm font-semibold mb-1">Assign permissions to this role:</legend>
                @foreach($permission as $permission)
                
                    <div class="flex items-center mb-1">
                        <input name="checkbox[]" id="{{ $permission->id }}" value="{{ $permission->id }}" aria-describedby="checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="checkbox[]" class="ml-3 text-sm font-sm text-gray-900 dark:text-gray-300">{{ $permission->name }}</label>
                    </div>
                
                @endforeach
            </fieldset>

            <div class="relative z-0 mb-6 group">
                <center>
                    <button type="submit" class="justify-items-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-2 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Create
                    </button>
                </center>
            </div>
        </form>
    </div>
@endsection
