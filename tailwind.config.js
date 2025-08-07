import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.vue",
        './node_modules/flowbite/**/*.js', // Importante para Flowbite
    ],

    darkMode: 'class', // ¡Asegúrate de que esta línea esté presente!

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Colores para el MODO CLARO (fondo blanco, detalles morados)
                'fondo-claro': '#FFFFFF',          // Fondo principal blanco
                'detalle-oscuro': '#6B21A8',       // Morado oscuro para textos, bordes, etc.
                'detalle-muy-oscuro': '#4A007C',   // Morado aún más oscuro para elementos principales (ej. navbar, botones)
                'accent-claro': '#9333EA',         // Morado más claro para acentos

                // Colores para el MODO OSCURO (fondo morado oscuro, detalles blancos/claros)
                // No necesitas definir explícitamente 'dark-fondo' si usas dark:bg-detalle-muy-oscuro
                // Los colores 'dark:text-white', 'dark:bg-white' se usarán en las clases
                // Si quieres un morado específico para el fondo oscuro, podrías añadirlo:
                'fondo-oscuro-personalizado': '#3A005C', // Un morado muy oscuro para el fondo en modo oscuro
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'), // Importante para Flowbite
    ],
};