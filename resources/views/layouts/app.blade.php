<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark"> {{-- Añadimos 'dark' para que el JS maneje el estado inicial --}}
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'TUPBlog') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Livewire Styles (important for Livewire components) --}}
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-fondo-claro dark:bg-fondo-oscuro-personalizado">
        <div class="min-h-screen bg-fondo-claro dark:bg-fondo-oscuro-personalizado">

            {{-- Barra de Navegación Superior (Navbar) --}}
            <nav class="bg-detalle-muy-oscuro dark:bg-white border-b border-gray-100 dark:border-gray-700 py-4 px-6 flex items-center justify-between shadow-md">
                {{-- Logo TUPBlog --}}
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
                        {{-- Aquí irá tu logo TUPBlog. Asegúrate de que el archivo exista en public/images/ --}}
                        <img src="{{ asset('images/logo-tupblog.png') }}" alt="TUPBlog Logo" class="h-10 w-auto dark:filter dark:invert"> {{-- 'dark:filter dark:invert' puede ayudar a invertir colores si tu logo es PNG y no tienes una versión oscura --}}
                        <span class="text-white text-2xl font-bold tracking-wide dark:text-detalle-muy-oscuro">TUPBlog</span>
                    </a>
                </div>

                {{-- Botones de Navegación --}}
                <div class="flex items-center space-x-4">
                    {{-- Botón Crear Post --}}
                    <a href="{{ route('posts.create') }}" class="inline-flex items-center px-4 py-2 bg-accent-claro hover:bg-detalle-oscuro text-white text-sm font-medium rounded-md transition duration-150 ease-in-out
                            dark:bg-detalle-oscuro dark:hover:bg-accent-claro dark:text-white">
                        <svg class="w-4 h-4 me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
                        {{ __('Crear Post') }}
                    </a>

                    {{-- Botón Modo Oscuro --}}
                    <button id="theme-toggle" type="button"
                        class="text-gray-200 dark:text-gray-600 hover:bg-gray-700 dark:hover:bg-gray-200 focus:outline-none focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5 transition duration-150 ease-in-out">
                        {{-- Icono Sol (modo claro) --}}
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 4a1 1 0 011 1v1a1 1 0 11-2 0V7a1 1 0 011-1zm-4 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm-4 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM6 10a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zm4-4a1 1 0 011 1v1a1 1 0 11-2 0V7a1 1 0 011-1zm0 8a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM2 10a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1z"></path></svg>
                        {{-- Icono Luna (modo oscuro) --}}
                        <svg id="theme-toggle-dark-icon" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.292 8.614a.999.999 0 00-1.071-.05L12 9.586V4a1 1 0 10-2 0v5.586l-4.221-1.022a.999.999 0 00-1.071.05A.997.997 0 004 9.414V14a1 1 0 001 1h4a1 1 0 001-1v-4.586l4.221 1.022a.999.999 0 001.071-.05A.997.997 0 0018 14V9.414a.997.997 0 00-.708-.8Z"></path></svg>
                    </button>

                    {{-- Botón Perfil --}}
                    <a href="{{ route('profile.edit') }}" class="text-gray-200 dark:text-gray-600 hover:text-white dark:hover:text-black text-sm font-medium transition duration-150 ease-in-out">
                        {{ __('Perfil') }}
                    </a>

                    {{-- Botón Cerrar Sesión --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-gray-200 dark:text-gray-600 hover:text-white dark:hover:text-black text-sm font-medium transition duration-150 ease-in-out">
                            {{ __('Cerrar Sesión') }}
                        </button>
                    </form>
                </div>
            </nav>

            <main class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    {{ $slot }} {{-- Aquí se inyectará el contenido específico de cada vista --}}
                </div>
            </main>
        </div>

        {{-- Script para el Botón de Modo Oscuro --}}
        <script>
            const themeToggleBtn = document.getElementById('theme-toggle');
            const htmlElement = document.documentElement;
            const lightIcon = document.getElementById('theme-toggle-light-icon');
            const darkIcon = document.getElementById('theme-toggle-dark-icon');

            // Set initial theme based on localStorage or system preference
            function setInitialTheme() {
                if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                    htmlElement.classList.add('dark');
                    lightIcon.classList.remove('hidden');
                    darkIcon.classList.add('hidden');
                } else {
                    htmlElement.classList.remove('dark');
                    darkIcon.classList.remove('hidden');
                    lightIcon.classList.add('hidden');
                }
            }

            setInitialTheme(); // Call on page load

            themeToggleBtn.addEventListener('click', function() {
                // Toggle 'dark' class on the html element
                htmlElement.classList.toggle('dark');

                // Save preference to localStorage and toggle icons
                if (htmlElement.classList.contains('dark')) {
                    localStorage.setItem('theme', 'dark');
                    lightIcon.classList.remove('hidden');
                    darkIcon.classList.add('hidden');
                } else {
                    localStorage.setItem('theme', 'light');
                    darkIcon.classList.remove('hidden');
                    lightIcon.classList.add('hidden');
                }
            });
        </script>
        {{-- Livewire Scripts --}}
        @livewireScripts
    </body>
</html>