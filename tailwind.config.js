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
                sans: ['JetBrainsMono-Regular', 'sans-serif'],
            },
            colors: {
                'recodex': '#86C332',
                'black-recodex': '#23272A',
                'white-recodex': '#F4F6F7',
                'lima': {
                    '50': '#f6fbea',
                    '100': '#e9f6d1',
                    '200': '#d3eda9',
                    '300': '#b6df77',
                    '400': '#9acf4c',
                    '500': '#86c332',
                    '600': '#5f8f21',
                    '700': '#496e1d',
                    '800': '#3d571d',
                    '900': '#344b1c',
                    '950': '#19290a',
                },
                'shark': {
                    '50': '#f4f6f7',
                    '100': '#e4e8e9',
                    '200': '#cbd2d6',
                    '300': '#a8b4b8',
                    '400': '#7c8e94',
                    '500': '#617279',
                    '600': '#536067',
                    '700': '#485156',
                    '800': '#3f464b',
                    '900': '#383e41',
                    '950': '#23272a',
                },
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
                    '@apply mx-auto px-8 sm:px-10 lg:px-12': {},
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
