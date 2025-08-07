<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;
    public $search = '';

    // Este método se ejecuta cuando se inicializa el componente
    public function mount()
    {
        // Puedes inicializar propiedades aquí si es necesario
    }

    public function render()
    {
        $posts = Post::where('published_at', '<=', now()) // Solo posts publicados
                     ->where('titulo', 'like', '%'.$this->search.'%') // Filtra por búsqueda
                     ->latest('published_at') // Ordena por fecha de publicación descendente
                     ->paginate(10);// Pagina los resultados (10 posts por página)
        return view('livewire.post-list',[
            'posts' => $posts,
        ])->layout('layouts.app');
    }
}
