<!DOCTYPE html>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased overflow-hidden">
    <div x-data="{ sidebarOpen: true }" class="min-h-screen bg-gray-100 flex">
        <!-- Sidebar -->
        <aside x-show="sidebarOpen" class="w-72 bg-white h-screen shadow-md p-4 flex flex-col justify-between"
            x-transition>
            <div>
                <header class="flex justify-center mb-6 px-3">
                    <h1 class="text-xl font-semibold whitespace-nowrap dark:text-white"><a
                            href="{{ route('dashboard') }}">Perpustakaan</a></h1>
                </header>



                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('dashboard') }}"
                            class="flex items-center px-3 py-2 mx-2 rounded-lg
        {{ Request::routeIs('dashboard.*') || Request::routeIs('dashboard')
    ? ' text-white bg-violet-500 dark:text-white hover:bg-violet-700 active:bg-violet-800'
    : ' text-slate-900 dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }}">

                            <!-- Icon Dashboard -->
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path fill-rule="evenodd"
                                    d="M3 6a3 3 0 013-3h2.25a3 3 0 013 3v2.25a3 3 0 01-3 3H6a3 3 0 01-3-3V6zm9.75 0a3 3 0 013-3H18a3 3 0 013 3v2.25a3 3 0 01-3 3h-2.25a3 3 0 01-3-3V6zM3 15.75a3 3 0 013-3h2.25a3 3 0 013 3V18a3 3 0 01-3 3H6a3 3 0 01-3-3v-2.25zm9.75 0a3 3 0 013-3H18a3 3 0 013 3V18a3 3 0 01-3 3h-2.25a3 3 0 01-3-3v-2.25z"
                                    clip-rule="evenodd" />
                            </svg>

                            <!-- Label -->
                            <span class="ml-3 whitespace-nowrap">Dashboard</span>
                        </a>
                    </li>



                    <hr class="my-2 border-gray-200">

                    <!-- Buku -->
                    <li>
                        <a href="{{ route('buku.index') }}"
                            class="{{ Request::routeIs('buku.*') || Request::routeIs('buku') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.47a.75.75 0 001-.708V4.262a.75.75 0 00-.5-.707A9.735 9.735 0 0018 3a9.707 9.707 0 00-5.25 1.533v16.103z">
                                </path>
                            </svg>
                            <span class="ml-3 whitespace-nowrap">Buku</span>
                        </a>
                    </li>

                    <!-- Peminjaman -->
                    <li>
                        <a href="{{ route('peminjaman.index') }}"
                            class="flex items-center px-3 py-2 rounded {{ request()->routeIs('peminjaman.*') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M5.566 4.657A4.505 4.505 0 016.75 4.5h10.5c.41 0 .806.055 1.183.157A3 3 0 0015.75 3h-7.5a3 3 0 00-2.684 1.657zM2.25 12a3 3 0 013-3h13.5a3 3 0 013 3v6a3 3 0 01-3 3H5.25a3 3 0 01-3-3v-6zM5.25 7.5c-.41 0-.806.055-1.184.157A3 3 0 016.75 6h10.5a3 3 0 012.683 1.657A4.505 4.505 0 0018.75 7.5H5.25z">
                                </path>
                            </svg>
                            <span class="ml-3 whitespace-nowrap">Peminjaman</span>
                        </a>
                    </li>

                    <!-- Anggota -->
                    <li>
                        <a href="{{ route('anggota.index') }}"
                            class="flex items-center px-3 py-2 rounded {{ request()->routeIs('anggota.*') ? 'text-white bg-violet-500 rounded-lg dark:text-white hover:bg-violet-700 active:bg-violet-800' : 'text-slate-900 rounded-lg dark:text-slate-200 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-slate-600 dark:active:bg-slate-500' }} flex items-center p-3 mx-2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                class="w-6 h-6">
                                <path
                                    d="M4.5 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM14.25 8.625a3.375 3.375 0 116.75 0 3.375 3.375 0 01-6.75 0zM1.5 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM17.25 19.128l-.001.144a2.25 2.25 0 01-.233.96 10.088 10.088 0 005.06-1.01.75.75 0 00.42-.643 4.875 4.875 0 00-6.957-4.611 8.586 8.586 0 011.71 5.157v.003z" />
                            </svg>
                            <span class="ml-3 whitespace-nowrap">Anggota</span>
                        </a>
                    </li>
                    <p></p>

                    <hr class="my-2 border-gray-200">

                    <!-- Logout -->
                    <li class="mt-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left flex items-center px-3 py-2 text-red-600 rounded hover:bg-red-100">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
                                </svg>
                                <span class="ml-3 whitespace-nowrap">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- User info -->
            <div class="mt-4 border-t pt-3">
                <a href="{{ route('profile.edit') }}"
                    class="flex items-center px-3 py-2 rounded hover:bg-gray-100 text-sm text-gray-700">
                    <div
                        class="flex-shrink-0 bg-gray-400 rounded-full h-8 w-8 flex items-center justify-center text-white font-bold">
                        {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                    </div>
                    <div class="ml-3">
                        <p class="font-medium">{{ auth()->user()->name }}</p>
                        <p class="text-xs text-gray-500">Admin</p>
                    </div>
                </a>
            </div>
        </aside>

        <!-- Konten -->
        <div class="flex-1">
            <!-- Toggle sidebar -->
            <button @click="sidebarOpen = !sidebarOpen"
                class="m-4 p-2 text-gray-700 hover:bg-gray-300 rounded transition">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <!-- Main content -->
            <main class="p-6 h-[calc(100vh-4rem)] overflow-y-auto">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>

<script>
    $(document).ready(() => {
        $(document).on('click', '#navIcon', function (e) {
            e.preventDefault()
            $('#sidebar').hide(300);
            $('#main').removeClass('pl-80')
            $(this).attr('id', 'navIconClose')
        })
        $(document).on('click', '#navIconClose', function (e) {
            e.preventDefault()
            $('#sidebar').show(300);
            $('#main').addClass('pl-80')
            $(this).attr('id', 'navIcon')
        })
    })
</script>

</html>