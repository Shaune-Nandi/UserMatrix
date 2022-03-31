@extends('layouts.app')


@section('title', 'Dashboard')

@section('body')

        @if(session('success'))
            <div class="w-1/4 p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif



    <div class="text-center"><a class="text-blue-500 hover:underline" href="/roles">Roles</a> / <a class="text-blue-500 hover:underline" href="/permissions">Permissions</a></div>

    <div class="text-2xl text-center mt-5">Users</div>
    <div class="grid">
        <div class="justify-self-center mt-5 w-full relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Roles</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($user as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <form action="#" method="POST">
                                @csrf
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                    <input type="number" hidden name="id" readonly value="{{ $user->id }}">
                                    {{ $user->first_name }} {{ $user->last_name }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $user->email }}
                                </td>
                                <td class="px-6 py-4 text-red-500 font-bold">
                                    @foreach($user->roles as $role)
                                        {{ $role->slug }}
                                    @endforeach
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <input class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="submit" name="update_btn" value="Update">
                                    <input class="font-medium text-blue-600 dark:text-blue-500 hover:underline" type="submit" name="delete_btn" value="Delete" formaction="#">
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
