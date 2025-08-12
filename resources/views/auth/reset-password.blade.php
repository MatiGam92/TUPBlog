<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen w-full p-4 bg-gray-900">
        <div class="w-full max-w-md p-6 bg-purple-500 bg-opacity-75 rounded-lg shadow-lg">
            <div class="text-center mb-6">
                <img src="{{ asset('logoTUPBlog2.png') }}" alt="TUPBlog Logo" class="h-136 w-156 mx-auto mb-4">
                <h5 class="text-xl font-medium text-white">Establece una nueva contraseña</h5>
            </div>

            <form class="space-y-6" method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Campo oculto para el token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Campo de correo electrónico -->
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-300">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5" placeholder="name@empresa.com" value="{{ old('email', $request->email) }}" required readonly>
                    @error('email')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Campo de nueva contraseña -->
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-300">Nueva contraseña</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5" required>
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>
                
                <!-- Campo para confirmar la nueva contraseña -->
                <div>
                    <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-300">Confirmar nueva contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••••" class="bg-gray-700 border border-gray-600 text-white sm:text-sm rounded-lg focus:ring-purple-500 focus:border-purple-500 block w-full p-2.5" required>
                </div>

                <!-- Botón para restablecer la contraseña -->
                <button type="submit" class="w-full text-white bg-purple-800 hover:bg-purple-950 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Restablecer contraseña
                </button>
            </form>
        </div>

        <div class="mt-8 text-center text-gray-600">
            <p>&copy; 2025 TUPBlog. Todos los derechos reservados.</p>
        </div>
    </div>
</x-guest-layout>
