<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Tailwind CSS -->
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- FontAwesome Kit -->
        <script src="https://kit.fontawesome.com/e5949163ce.js" crossorigin="anonymous"></script>

        <!-- Flowbite (for navbar - Tailwind) -->
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.1/dist/flowbite.min.css" />
        <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
        
        <title>@yield('title')</title>


    </head>
    <body class="bg-white px-1 dark:bg-gray-900">
        <!-- navbar -->
        <nav class="bg-gray-200 rounded-2xl mt-2 px-2 py-2 dark:bg-gray-800">

            <div class=" flex flex-wrap justify-between items-center mx-2">
                <a href="/" class="flex items-center">
                    <span class=" text-xl font-semibold dark:text-white">UserMatrix</span>
                </a>
                @auth
                    <div>
                        <a href="/dashboard" class="block py-2 pr-4 pl-3 text-blue-500 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                            Dashboard
                        </a>
                    </div>
                @endauth
                <div>
                    @guest
                        <div>
                            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                                <li>
                                    <a href="/register" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                        Register
                                    </a>
                                </li>
                                <li>
                                    <a href="/login" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                        Login
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @endguest

                    @auth
                        <button id="dropdownDividerButton" data-dropdown-toggle="dropdownDivider" class="text-white bg-blue-400 hover:bg-blue-600 rounded-md text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700" type="button">
                            {{ auth()->user()->first_name }} {{ auth()->user()->last_name }}
                            <i class="fa-solid fa-caret-down"></i>
                        </button>

                        <div id="dropdownDivider" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600" data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(373.6px, 660px, 0px);"> 
                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDividerButton">
                                <li>
                                    <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Profile<span class="text-rose-500 font-bold"> **Incomplete**</span></a>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="/logout" class="block text-sm py-2 px-4 text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Logout</a>
                            </div>
                        </div>
                    @endauth
                </div>
            </div>
        </nav>
        <!-- navbarEnd -->

        <div class="my-2 px-2">























































            @yield('body')
        </div>
    </body>
</html>