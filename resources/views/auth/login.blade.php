<x-guest-layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 min-h-screen w-full">
        <!-- Columna de imagen de fondo (oculta en dispositivos pequeños) -->
        <div class="hidden lg:flex lg:col-span-2 items-center justify-center bg-cover bg-center h-full" style="background-image: url('{{ asset('fondoTUPBlog.jpg') }}');">
        </div>

        <!-- Columna del formulario de login -->
        <div class="flex flex-col items-center justify-center p-4 h-full">
            <div class="w-full max-w-md p-6 bg-purple-900 bg-opacity-75 rounded-lg shadow-lg">
                <div class="text-center mb-6">
                    <img src="{{ asset('logoTUPBlog2.png') }}" alt="TUPBlog Logo" class="h-136 w-156 mx-auto mb-4">
                    <h5 class="text-xl font-medium text-white">¡Bienvenido a TUPBlog!</h5>
                </div>
                
                <!-- Mensaje de estado de la sesión, si existe -->
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-400">
                        {{ session('status') }}
                    </div>
                @endif
                
                <!-- Formulario de login -->
                <form class="space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Correo electrónico</label>
                        <input type="email" name="email" id="email" class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 @error('email') border-red-600 @enderror" placeholder="name@empresa.com" required autofocus>
                        <!-- Mensaje de error para el campo de correo -->
                        @error('email')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 @error('password') border-red-600 @enderror" required>
                        <!-- Mensaje de error para el campo de contraseña -->
                        @error('password')
                            <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Recordarme y Olvidaste tu contraseña -->
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember_me" name="remember" type="checkbox" class="w-4 h-4 border border-gray-600 rounded bg-gray-700 focus:ring-3 focus:ring-purple-300">
                            </div>
                            <label for="remember_me" class="ml-3 text-sm text-gray-300">Recordarme</label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-sm font-medium text-purple-950 hover:underline">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    <button type="submit" class="w-full text-white bg-purple-800 hover:bg-purple-950 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Ingresar
                    </button>

                    <div class="text-sm font-medium text-gray-300 text-center">
                        ¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-purple-950 hover:underline">Regístrate</a>
                    </div>
                </form>
            </div>
            
            <div class="mt-8 text-center text-gray-600">
                <p>&copy; 2025 TUPBlog. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</x-guest-layout>
