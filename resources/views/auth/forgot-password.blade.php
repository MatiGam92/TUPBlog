<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen w-full p-4 bg-gray-900">
        <div class="w-full max-w-md p-6 bg-purple-500 bg-opacity-75 rounded-lg shadow-lg">
            <div class="text-center mb-6">
                <img src="{{ asset('logoTUPBlog2.png') }}" alt="TUPBlog Logo" class="h-136 w-156 mx-auto mb-4">
                <h5 class="text-xl font-medium text-white">¿Olvidaste tu contraseña?</h5>
            </div>
            
            <!-- Mensaje de instrucción -->
            <div class="mb-4 text-sm font-medium text-gray-300">
                ¿Olvidaste tu contraseña? No hay problema. Simplemente introduce tu dirección de correo electrónico y te enviaremos un enlace para que puedas elegir una nueva.
            </div>

            <!-- Mensaje de estado de la sesión, si existe -->
            @if (session('status'))
                <div class="mb-4 font-medium text-sm text-green-400">
                    {{ session('status') }}
                </div>
            @endif

            <form class="space-y-6" method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Campo de correo electrónico -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5" placeholder="name@empresa.com" required autofocus>
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Botón para enviar el enlace -->
                <button type="submit" class="w-full text-white bg-purple-800 hover:bg-purple-950 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Enviar enlace de recuperación
                </button>

                <!-- Enlace para volver al login -->
                <div class="text-sm font-medium text-gray-300 text-center">
                    <a href="{{ route('login') }}" class="text-purple-950 hover:underline">Volver a Ingresar</a>
                </div>
            </form>
        </div>

        <div class="mt-8 text-center text-gray-600">
            <p>&copy; 2025 TUPBlog. Todos los derechos reservados.</p>
        </div>
    </div>
</x-guest-layout>
