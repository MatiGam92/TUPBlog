<x-guest-layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 min-h-screen w-full">
        <div class="hidden lg:flex lg:col-span-2 items-center justify-center bg-cover bg-center h-full" style="background-image: url('{{ asset('fondoTUPBlog.jpg') }}');">
        </div>

        <div class="flex flex-col items-center justify-center p-4 h-full">
            <div class="w-full max-w-md p-6 bg-purple-900 bg-opacity-75 rounded-lg shadow-lg">
                <div class="text-center mb-6">
                    <img src="{{ asset('logoTUPBlog2.png') }}" alt="TUPBlog Logo" class="h-136 w-156 mx-auto mb-4">
                    <h5 class="text-xl font-medium text-white">¡Bienvenido a TUPBlog!</h5>
                </div>
                
                <form class="space-y-6" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Correo electrónico</label>
                        <input type="email" name="email" id="email" class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5" placeholder="name@empresa.com" required>
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5" required>
                    </div>
                    <div class="flex items-start">
                        </div>
                    <button type="submit" class="w-full text-white bg-purple-800 hover:bg-purple-950 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Ingresar
                    </button>
                    <div class="text-sm font-medium text-gray-300 text-center">
                        ¿No tienes una cuenta? <a href="register" class="text-purple-950 hover:underline">Regístrate</a>
                    </div>
                    <div class="text-sm font-medium text-gray-300 text-center">
                        ¿Olvidaste tu contraseña? <a href="#" class="text-purple-950 hover:underline">Recupérala</a>
                    </div>
                </form>
            </div>

            <div class="mt-8 text-center text-gray-600">
                <p>&copy; 2025 TUPBlog. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</x-guest-layout>