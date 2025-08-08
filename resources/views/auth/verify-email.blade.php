<x-guest-layout>
    <div class="flex flex-col items-center justify-center min-h-screen w-full p-4 bg-gray-900">
        <div class="w-full max-w-md p-6 bg-purple-900 bg-opacity-75 rounded-lg shadow-lg">
            <div class="text-center mb-6">
                <img src="{{ asset('logoTUPBlog2.png') }}" alt="TUPBlog Logo" class="h-136 w-156 mx-auto mb-4">
                <h5 class="text-xl font-medium text-white">Verifica tu dirección de correo electrónico</h5>
            </div>

            <!-- Mensaje principal de verificación -->
            <div class="mb-4 text-sm font-medium text-gray-300">
                Gracias por registrarte en TUPBlog. Antes de continuar, por favor, verifica tu dirección de correo electrónico haciendo clic en el enlace que te acabamos de enviar. Si no recibiste el correo, con gusto te enviaremos otro.
            </div>

            <!-- Mensaje de éxito si el enlace fue reenviado -->
            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-sm font-medium text-green-400">
                    Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste durante el registro.
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between">
                <!-- Formulario para reenviar el enlace -->
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="w-full text-white bg-gray-700 hover:bg-purple-950 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Reenviar correo de verificación
                    </button>
                </form>

                <!-- Formulario para cerrar sesión -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center ml-4">
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
