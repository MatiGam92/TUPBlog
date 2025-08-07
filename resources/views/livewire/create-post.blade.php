
<div class="max-w-4xl mx-auto py-10 px-4 sm:px-6 lg:px-8 bg-white dark:bg-gray-800 shadow-md sm:rounded-lg">
    <h2 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-6 text-center">{{ __('Crear Nueva Publicación') }}</h2>

    @if (session()->has('message'))
        <div class="bg-emerald-100 border border-emerald-400 text-emerald-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <svg class="fill-current h-6 w-6 text-emerald-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.697l-2.651 3.152a1.2 1.2 0 0 1-1.697-1.697l3.152-2.651-3.152-2.651a1.2 1.2 0 1 1 1.697-1.697l2.651 3.152 2.651-3.152a1.2 1.2 0 0 1 0 1.697z"/></svg>
            </span>
        </div>
    @endif

    <form wire:submit.prevent="storePost" class="space-y-6">
        {{-- Título del Post --}}
        <div>
            <label for="titulo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Título') }}</label>
            <input type="text" id="titulo" wire:model.blur="titulo"
                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            @error('titulo') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        {{-- Contenido del Post --}}
        <div>
            <label for="contenido" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Contenido') }}</label>
            <textarea id="contenido" wire:model.blur="contenido" rows="10"
                      class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>
            @error('contenido') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror
        </div>

        {{-- Campo de Imagen con Previsualización --}}
        <div>
            <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Imagen Destacada') }}</label>
            {{-- Input de archivo con estilo ajustado --}}
            <input type="file" id="imagen" wire:model.live="imagen"
                   class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
                          focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
                          rounded-md shadow-sm
                          file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0
                          file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700
                          hover:file:bg-violet-100 dark:file:bg-violet-900 dark:file:text-violet-200 dark:hover:file:bg-violet-800">
            @error('imagen') <span class="text-red-500 text-sm mt-1">{{ $message }}</span> @enderror

            {{-- Indicador de carga para la imagen --}}
            <div wire:loading wire:target="imagen" class="mt-2 text-sm text-gray-500 dark:text-gray-400">Cargando imagen...</div>

            {{-- Previsualización de la imagen --}}
            @if ($imagen)
                <div class="mt-4 relative w-full h-48 sm:h-64 md:h-80 lg:h-96 rounded-lg overflow-hidden border border-gray-300 dark:border-gray-700">
                    <img src="{{ $imagen->temporaryUrl() }}" class="object-cover w-full h-full" alt="Previsualización de imagen">
                    <button type="button" wire:click="$set('imagen', null)"
                            class="absolute top-2 right-2 p-2 bg-red-600 text-white rounded-full hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    </button>
                </div>
            @endif
        </div>

        {{-- Botón de Enviar --}}
        <div class="flex justify-end">
            <button type="submit"
                    class="px-5 py-2.5 bg-detalle-muy-oscuro hover:bg-detalle-oscuro text-white font-semibold rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-accent-claro dark:focus:ring-detalle-oscuro transition duration-150 ease-in-out">
                {{ __('Publicar Post') }}
            </button>
        </div>
    </form>
</div>