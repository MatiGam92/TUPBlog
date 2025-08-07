<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <h2 class="text-2xl font-semibold mb-4">{{ __('Latest Posts') }}</h2>

        {{-- Campo de búsqueda --}}
        <div class="mb-4">
            <input type="text" wire:model.live.debounce.300ms="search" placeholder="{{ __('Search posts...') }}"
                class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:border-gray-600 dark:text-white">
        </div>

        {{-- Lista de Posts --}}
        @forelse ($posts as $post)
            <div class="mb-6 p-4 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm">
                <h3 class="text-xl font-bold text-detalle-oscuro dark:text-accent-claro mb-2">
                    <a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a>
                </h3>
                <p class="text-gray-700 dark:text-gray-300 mb-2">{{ Str::limit($post->content, 150) }}</p>
                <div class="text-sm text-gray-500 dark:text-gray-400">
                    {{ __('Published on') }} {{ $post->published_at->format('M d, Y') }} {{ __('by') }} {{ $post->user->name }}
                </div>
            </div>
        @empty
            <p class="text-gray-600 dark:text-gray-400">{{ __('No posts found.') }}</p>
        @endforelse

        {{-- Enlaces de paginación --}}
        <div class="mt-6">
            {{ $posts->links() }}
        </div>
    </div>
</div>