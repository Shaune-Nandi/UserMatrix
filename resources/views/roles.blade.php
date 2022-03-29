@extends('layouts.app')

@section('title', 'Roles Table')

@section('body')
    <div class="flex justify-center mt-5">
        <a href="/roles/create" class="justify-self-center text-md text-blue-600 dark:text-blue-500 hover:underline">create a new role</a>
    </div>
    
    <div class="grid">
        <div class="justify-self-center mt-5 w-3/4 relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Role Name</th>
                        <th scope="col" class="px-6 py-3">Slug</th>
                        <th scope="col" class="px-6 py-3">Permissions</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $roles)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <form action="/roles/update/{{ $roles->id }}" method="POST">
                                @csrf
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <input type="number" hidden name="id" readonly value="{{ $roles->id }}">
                                    {{ $roles->name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $roles->slug }}
                                </td>
                                <td class="px-6 py-4 text-lime-500">
                                    @foreach($roles->permissions as $permission)
                                        {{ $permission->slug }}
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <input class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="submit" name="update_btn" value="Update">
                                    <input class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="submit" name="delete_btn" value="Delete" formaction="/roles/delete/{{ $roles->id }}">
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


















    <br><br><br>

@endsection
