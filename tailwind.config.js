import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/views/livewire/*.blade.php',
        './app/Livewire/*.php'
    ],

    theme: {
        extend: {
            boxShadow: {
                'top-left': '-5px -5px 17px -8px rgba(0, 0, 0, 0.75)',
            }
        },
    },

    plugins: [forms],
};
