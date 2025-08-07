<x-guest-layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 min-h-screen w-full">
        <!-- Columna de imagen de fondo (oculta en dispositivos pequeños) -->
        <div class="hidden lg:flex lg:col-span-2 items-center justify-center bg-cover bg-center h-full" style="background-image: url('{{ asset('fondoTUPBlog.jpg') }}');">
        </div>

        <!-- Columna del formulario de registro -->
        <div class="flex flex-col items-center justify-center p-4 h-full">
            <div class="w-full max-w-md p-6 bg-purple-900 bg-opacity-75 rounded-lg shadow-lg">
                <div class="text-center mb-6">
                    <img src="{{ asset('logoTUPBlog2.png') }}" alt="TUPBlog Logo" class="h-136 w-156 mx-auto mb-4">
                    <h5 class="text-xl font-medium text-white">¡Únete a TUPBlog!</h5>
                </div>
                
                <!-- Formulario de registro -->
                <form class="space-y-6" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-300">Nombre completo</label>
                        <input type="text" name="name" id="name" class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 @error('name') border-red-500 @enderror" placeholder="Tu nombre y apellido" required>
                        @error('name')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Correo electrónico</label>
                        <input type="email" name="email" id="email" class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 @error('email') border-red-500 @enderror" placeholder="name@empresa.com" required>
                        @error('email')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5 @error('password') border-red-500 @enderror" required>
                        @error('password')
                            <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-300">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5" required>
                    </div>

                    <button type="submit" class="w-full text-white bg-purple-800 hover:bg-purple-950 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Crear cuenta
                    </button>
                    <div class="text-sm font-medium text-gray-300 text-center">
                        ¿Ya tienes una cuenta? <a href="{{ route('login') }}" class="text-purple-950 hover:underline">Inicia sesión</a>
                    </div>
                </form>
            </div>

            <div class="mt-8 text-center text-gray-600">
                <p>&copy; 2025 TUPBlog. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</x-guest-layout>
