<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen w-full p-4 bg-gray-900">
        <div class="w-full max-w-md p-6 bg-purple-500 bg-opacity-75 rounded-lg shadow-lg">
            <div class="text-center mb-6">
                <img src="{{ asset('logoTUPBlog2.png') }}" alt="TUPBlog Logo" class="h-136 w-156 mx-auto mb-4">
                <h5 class="text-xl font-medium text-white">¡Tu cuenta ha sido verificada!</h5>
            </div>

            <!-- Mensaje de confirmación -->
            <div class="mb-4 text-sm font-medium text-gray-300">
                Tu dirección de correo electrónico ha sido verificada con éxito. Ya puedes acceder a todas las funciones de TUPBlog.
            </div>

            <div class="mt-4 flex flex-col space-y-4">
                <!-- Botón para ir al inicio/dashboard -->
                <a href="{{ route('dashboard') }}" class="w-full text-white bg-gray-700 hover:bg-purple-950 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Inicio
                </a>

                <!-- Botón para ir al perfil -->
                <a href="{{ route('profile.edit') }}" class="w-full text-white bg-purple-800 hover:bg-purple-950 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Perfil
                </a>
            </div>
            
            <div class="mt-4 flex items-center justify-center">
                <!-- Formulario para cerrar sesión -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
        
        <div class="mt-8 text-center text-gray-600">
            <p>&copy; 2025 TUPBlog. Todos los derechos reservados.</p>
        </div>
    </div>
</x-guest-layout>