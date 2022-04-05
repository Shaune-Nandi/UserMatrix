@extends('layouts.app')

@section('title', 'Update role permissions')

@section('body')
    @if(session('success'))
            <div class="flex justify-center">
                <div id="alert-3" class="w-1/2 flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
                    <svg class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                        {{ session('success') }}
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-3" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
            </div>
        @endif
        




    <div class="grid">
        <form action="/roles/update/permissions/save" method="POST" class="justify-self-center bg-gray-100 rounded-md w-1/2 mt-5 mx-5 px-5 py-5">
            @csrf
            <h3 class="text-2xl text-center mb-3">Update {{ $role->name }} permissions</h3>

            <input type="number" name="role_id" id="id" readonly hidden value="{{ $role->id }}">
            
                <fieldset class="mt-3">
                    <legend class="text-sm text-center mb-10">Select the permissions you want to assign:</legend>
                    <div class="flex justify-center">
                        @foreach($permissions as $permission)            
                            <div class="flex items-center ml-10 mb-1">
                                <input name="permission[]" id="{{ $permission->slug }}" value="{{ $permission->id }}" aria-describedby="checkbox" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="permission[]" class="ml-2 text-sm font-sm text-gray-900 dark:text-gray-300">{{ $permission->name }}</label>
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
