@extends('layouts.app')

@section('title', 'Permissions Table')

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

    @can('create_permission', App\Models\Permission::class)
        <div class="flex justify-center mt-5">
            <a href="/permissions/create" class="justify-self-center text-md text-blue-600 dark:text-blue-500 hover:underline">create a new permission</a>
        </div>
    @endcan
    
    <div class="grid">
        <div class="justify-self-center mt-5 w-1/2 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Permission Name</th>
                        <th scope="col" class="px-6 py-3">Slug</th>
                        @canany(['update_permission', 'delete_permission'], App\Models\Permission::class)<th scope="col" class="px-6 py-3"></th>@endcanany
                    </tr>
                </thead>
                <tbody>
                    @foreach($permission as $permission)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <form action="/permissions/update/{{ $permission->id }}" method="POST">
                                @csrf
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <input type="number" hidden name="id" readonly value="{{ $permission->id }}">
                                    {{ $permission->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $permission->slug }}
                                </td>
                                @canany(['update_permission', 'delete_permission'], App\Models\Permission::class)
                                    <td class="px-6 py-4 text-right">
                                        @can('update_permission', App\Models\Permission::class)
                                            <input class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="submit" name="update_btn" value="Update">
                                        @endcan
                                        @can('delete_permission', App\Models\Permission::class)
                                             | <input class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="submit" name="delete_btn" value="Delete" formaction="/permission/delete/{{ $permission->id }}">
                                        @endcan
                                    </td>
                                @endcanany
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


















    <br><br><br>

@endsection

