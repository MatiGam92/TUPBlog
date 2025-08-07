<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\WithFileUploads; // Para subir imágenes (si las añades más tarde)

class CreatePost extends Component
{
    use WithFileUploads;
    // Propiedades del formulario
    public $titulo = '';
    public $contenido = '';
    public $imagen; // Para la imagen destacada (opcional)

    // Reglas de validación
    protected $rules = [
        'titulo' => 'required|string|min:5|max:255',
        'contenido' => 'required|string|min:20',
        'imagen' => 'nullable|image|max:2048', // Descomenta si usas subida de imágenes (max 1MB)
    ];

    // Mensajes de validación personalizados
    protected $messages = [
        'titulo.required' => 'El título es obligatorio.',
        'titulo.min' => 'El título debe tener al menos 5 caracteres.',
        'titulo.max' => 'El título no puede exceder los 255 caracteres.',
        'contenido.required' => 'El contenido de la publicación es obligatorio.',
        'contenido.min' => 'El contenido debe tener al menos 20 caracteres.',
        'imagen.image' => 'El archivo debe ser una imagen (jpg, png, bmp, gif, svg, webp).',
        'imagen.max' => 'La imagen no puede ser mayor a 2MB.',
    ];

    // Para la subida de archivos (descomenta si vas a subir imágenes)
    // use WithFileUploads;

    public function storePost()
    {
        $this->validate(); // Valida los datos

        // Lógica para guardar la imagen (si la implementas)
        $imagePath = null;
        if ($this->imagen) {
            $imagePath = $this->imagen->store('posts', 'public'); // Guarda en storage/app/public/posts
        }

        // Crear el post
        Post::create([
            'user_id' => auth()->id(), // Asigna el ID del usuario autenticado
            'titulo' => $this->titulo,
            'slug' => Str::slug($this->titulo), // Genera un slug a partir del título
            'contenido' => $this->contenido,
            'imagen' => $imagePath,
            'published_at' => now(), // Publica inmediatamente
        ]);

        // Limpiar el formulario
        $this->reset(['titulo', 'contenido', 'imagen']);

        // Mostrar un mensaje de éxito o redirigir
        session()->flash('message', '¡Post creado exitosamente!');
        return redirect()->route('dashboard'); // Redirige al listado de posts
    }

    public function render()
    {
        return view('livewire.create-post')
                    ->layout('layouts.app'); // Usa el layout principal de la aplicación
    }
}