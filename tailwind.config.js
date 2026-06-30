import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    DEFAULT: '#2557A7',
                    dark: '#164081',
                    hover: '#1F4F9A',
                },
                secondary: {
                    DEFAULT: '#6F6F6F',
                    light: '#EEF4FF',
                },
                background: '#F3F2F1',
                card: '#FFFFFF',
                text: {
                    primary: '#2D2D2D',
                    secondary: '#6F6F6F',
                },
                success: '#008561',
                danger: '#D93025',
                warning: '#F5C518',
                border: '#D9D9D9',
                navbar: {
                    bg: '#FFFFFF',
                    border: '#E4E2E0',
                    text: '#2D2D2D',
                    active: '#2557A7',
                }
            }
        },
    },

    plugins: [forms],
};
