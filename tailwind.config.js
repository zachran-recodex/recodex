import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const plugin = require('tailwindcss/plugin');

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'recodex': '#86C332',
                'black-recodex': '#23272A',
                'white-recodex': '#FAF9F5',
            },
            animation: {
                'infinite-scroll': 'infinite-scroll 25s linear infinite',
            },
            keyframes: {
                'infinite-scroll': {
                    from: { transform: 'translateX(0)' },
                    to: { transform: 'translateX(-100%)' },
                }
            }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin'),
        plugin(function({ addUtilities }) {
            addUtilities({
                '.py-main': {
                        paddingTop: '2rem',
                        paddingBottom: '2rem',
                    '@screen sm': {
                        paddingTop: '3rem',
                        paddingBottom: '3rem',
                    },
                    '@screen lg': {
                        paddingTop: '4rem',
                        paddingBottom: '4rem',
                    }
                },
                '.container-main': {
                    '@apply container mx-auto px-4 sm:px-6 lg:px-8': {},
                },
                '.text-title': {
                    '@apply text-3xl sm:text-4xl font-normal mb-4': {},
                },
                '.text-title-8': {
                    '@apply text-3xl sm:text-4xl font-normal mb-8': {},
                },
                '.text-desc': {
                    '@apply text-xl sm:text-2xl text-justify font-light mb-4': {},
                },
            });
        })
    ],
};
