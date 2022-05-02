<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Mercatodo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
<div>
    <header class="main-header clearfix">
        <nav>
            <div
                class="flex items-center justify-end bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
                @if (Route::has('login'))
                    <div class="hidden px-6 py-4 sm:block">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                               class="text-sm text-gray-700 dark:text-gray-500 underline">{{trans('client.welcome.fields.dashboard')}}</a>
                        @else
                            <a href="{{ route('login') }}"
                               class="text-sm text-gray-700 dark:text-gray-500 underline">{{trans('client.welcome.fields.login')}}</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                   class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{trans('client.welcome.fields.register')}}</a>
                            @endif
                        @endauth
                    </div>
                @endif
                <div>
                    <div class="container mx-auto px-6 sm:px-12 flex flex-col-reverse sm:flex-row relative">
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <body>
    <div x-data="{ cartOpen: false , isOpen: false }" class="bg-white">
        <header>
            <div class="container mx-auto px-6 py-3">
                <div class="flex items-center justify-between">
                    <div class="hidden w-full text-gray-600 md:flex md:items-center">
                        <svg class="h-5 w-5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M16.2721 10.2721C16.2721 12.4813 14.4813 14.2721 12.2721 14.2721C10.063 14.2721 8.27214 12.4813 8.27214 10.2721C8.27214 8.06298 10.063 6.27212 12.2721 6.27212C14.4813 6.27212 16.2721 8.06298 16.2721 10.2721ZM14.2721 10.2721C14.2721 11.3767 13.3767 12.2721 12.2721 12.2721C11.1676 12.2721 10.2721 11.3767 10.2721 10.2721C10.2721 9.16755 11.1676 8.27212 12.2721 8.27212C13.3767 8.27212 14.2721 9.16755 14.2721 10.2721Z"
                                  fill="currentColor"/>
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                  d="M5.79417 16.5183C2.19424 13.0909 2.05438 7.39409 5.48178 3.79417C8.90918 0.194243 14.6059 0.054383 18.2059 3.48178C21.8058 6.90918 21.9457 12.6059 18.5183 16.2059L12.3124 22.7241L5.79417 16.5183ZM17.0698 14.8268L12.243 19.8965L7.17324 15.0698C4.3733 12.404 4.26452 7.97318 6.93028 5.17324C9.59603 2.3733 14.0268 2.26452 16.8268 4.93028C19.6267 7.59603 19.7355 12.0268 17.0698 14.8268Z"
                                  fill="currentColor"/>
                        </svg>
                        <span class="mx-1 text-sm">Col</span>
                    </div>
                    <div class="w-full text-gray-700 md:text-center text-2xl font-semibold">
                        {{trans('client.welcome.fields.mercatodo')}}
                    </div>
                    <div class="flex items-center justify-end w-full">
                        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none mx-4 sm:mx-0">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="2"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </button>

                        <div class="flex sm:hidden">
                            <button @click="isOpen = !isOpen" type="button"
                                    class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500"
                                    aria-label="toggle menu">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                    <path fill-rule="evenodd"
                                          d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
                    <div class="flex flex-col sm:flex-row">
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">{{trans('Home')}}</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0"
                           href="#">{{trans('client.welcome.fields.categories')}}</a>
                        <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">{{trans('About')}}</a>
                    </div>
                </nav>
                <div class="relative mt-6 max-w-lg mx-auto">
                </div>
            </div>
        </header>
        <main class="my-8">
            <div class="container mx-auto px-6">
                <div class="h-64 rounded-md overflow-hidden bg-cover bg-center"
                     style="background-image: url('https://images.unsplash.com/photo-1577655197620-704858b270ac?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1280&q=144')">
                    <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                        <div class="px-10 max-w-xl">
                            <h2 class="text-2xl text-white font-semibold">{{trans('client.welcome.fields.mercatodo')}}</h2>
                            <p class="mt-2 text-gray-400">{{trans('client.welcome.descriptions.one')}}</p>
                            <a href="{{ route('register') }}"
                                class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <span>{{trans('client.welcome.fields.register')}}</span>
                                <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                     stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="md:flex mt-8 md:-mx-4">
                    <div class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2"
                         style="background-image: url('https://images.unsplash.com/photo-1547949003-9792a18a2601?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80')">
                        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                            <div class="px-10 max-w-xl">
                                <h2 class="text-2xl text-white font-semibold">{{trans('client.welcome.fields.leather')}}</h2>
                                <p class="mt-2 text-gray-400">{{trans('client.welcome.descriptions.two')}}</p>
                                <button
                                    class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                    <span>{{trans('client.welcome.fields.see now')}}</span>
                                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2"
                         style="background-image: url('https://images.unsplash.com/photo-1486401899868-0e435ed85128?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80')">
                        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                            <div class="px-10 max-w-xl">
                                <h2 class="text-2xl text-white font-semibold">{{trans('client.welcome.fields.technology')}}</h2>
                                <p class="mt-2 text-gray-400">{{trans('client.welcome.descriptions.three')}}</p>
                                <button
                                    class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none">
                                    <span>{{trans('client.welcome.fields.shop now')}}</span>
                                    <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-16">
                    <h3 class="text-gray-600 text-2xl font-medium">{{trans('client.welcome.fields.fashions')}}</h3>
                    <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover"
                                 style="background-image: url('https://images.unsplash.com/photo-1563170351-be82bc888aa4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=376&q=80')">
                                <button
                                    class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">{{trans('client.welcome.fields.chanel')}}</h3>
                                <span class="text-gray-500 mt-2">$12</span>
                            </div>
                        </div>
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover"
                                 style="background-image: url('https://images.unsplash.com/photo-1544441893-675973e31985?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80')">
                                <button
                                    class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">{{trans('client.welcome.fields.man mix')}}</h3>
                                <span class="text-gray-500 mt-2">$12</span>
                            </div>
                        </div>
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover"
                                 style="background-image: url('https://images.unsplash.com/photo-1532667449560-72a95c8d381b?ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80')">
                                <button
                                    class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">{{trans('client.welcome.fields.classic watch')}}</h3>
                                <span class="text-gray-500 mt-2">$12</span>
                            </div>
                        </div>
                        <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                            <div class="flex items-end justify-end h-56 w-full bg-cover"
                                 style="background-image: url('https://images.unsplash.com/photo-1590664863685-a99ef05e9f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=345&q=80')">
                                <button
                                    class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                    <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                         stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </button>
                            </div>
                            <div class="px-5 py-3">
                                <h3 class="text-gray-700 uppercase">{{trans('client.welcome.fields.women mix')}}</h3>
                                <span class="text-gray-500 mt-2">$12</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    </body>
    <footer>
        <section class="bg-white mt-20">
            <div class="max-w-2xl px-6 text-center mx-auto">
                <h2 class="text-3xl font-semibold text-gray-800">{{trans('client.welcome.descriptions.four')}}</h2>
                <p class="text-gray-600 mt-4">{{trans('client.welcome.descriptions.five')}}</p>

                <div class="flex items-end justify-center mt-16">
                    <svg width="189" height="188" viewBox="0 0 189 188" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0)">
                            <path
                                d="M94.074 188.148C146.03 188.148 188.148 146.03 188.148 94.074C188.148 42.1184 146.03 0 94.074 0C42.1184 0 0 42.1184 0 94.074C0 146.03 42.1184 188.148 94.074 188.148Z"
                                fill="#2D3748"/>
                            <path
                                d="M135.938 52.784V84.05C135.938 84.503 135.927 84.955 135.917 85.407C135.897 86.343 135.845 87.278 135.763 88.203C135.743 88.522 135.711 88.84 135.67 89.159C135.536 90.485 135.352 91.791 135.115 93.087C135.032 93.519 134.95 93.94 134.857 94.362C134.847 94.454 134.827 94.537 134.806 94.619C134.723 95.051 134.62 95.473 134.518 95.894C134.477 96.12 134.415 96.346 134.364 96.573C134.312 96.768 134.261 96.964 134.2 97.159C133.983 98.002 133.737 98.825 133.479 99.647C133.356 100.038 133.233 100.418 133.099 100.809C133.088 100.85 133.068 100.891 133.058 100.932C132.934 101.281 132.811 101.631 132.688 101.98C132.647 102.083 132.606 102.185 132.564 102.299C132.441 102.628 132.318 102.957 132.184 103.286C132.03 103.687 131.866 104.078 131.701 104.469C131.557 104.819 131.403 105.168 131.249 105.518C131.229 105.58 131.197 105.631 131.177 105.692C131.002 106.062 130.838 106.433 130.663 106.792C130.488 107.172 130.303 107.553 130.107 107.934C129.737 108.684 129.336 109.435 128.935 110.165C128.75 110.494 128.565 110.823 128.379 111.152C126.796 113.877 125.038 116.437 123.126 118.801C122.868 119.14 122.602 119.469 122.324 119.788C121.943 120.25 121.552 120.703 121.162 121.145C120.812 121.536 120.463 121.926 120.103 122.307C119.116 123.366 118.108 124.374 117.08 125.32C116.875 125.526 116.658 125.711 116.442 125.906C116.093 126.225 115.744 126.533 115.383 126.831C115.106 127.078 114.818 127.314 114.529 127.551C113.789 128.157 113.049 128.743 112.299 129.288C111.99 129.525 111.671 129.751 111.353 129.967C110.839 130.337 110.315 130.687 109.79 131.026C109.502 131.221 109.204 131.406 108.905 131.581C107.856 132.229 106.798 132.825 105.749 133.339C105.492 133.472 105.235 133.596 104.978 133.719C104.72 133.842 104.454 133.966 104.176 134.089C103.836 134.243 103.497 134.387 103.158 134.521C103.024 134.583 102.89 134.634 102.757 134.675C102.357 134.84 101.945 134.994 101.544 135.127C101.04 135.312 100.526 135.466 100.023 135.61C99.673 135.713 99.314 135.805 98.964 135.887C98.943 135.898 98.923 135.908 98.892 135.908C98.542 135.99 98.193 136.073 97.843 136.134C97.75 136.155 97.659 136.175 97.566 136.185C97.278 136.236 96.99 136.288 96.702 136.319C96.291 136.381 95.88 136.432 95.469 136.453C95.326 136.473 95.192 136.484 95.047 136.484C94.719 136.505 94.39 136.515 94.07 136.515H94.04C93.721 136.515 93.402 136.505 93.084 136.484C92.96 136.484 92.837 136.474 92.713 136.453C92.426 136.443 92.127 136.411 91.819 136.37C91.757 136.37 91.685 136.36 91.624 136.35C91.243 136.299 90.863 136.237 90.472 136.165C90.144 136.114 89.815 136.041 89.475 135.959C87.717 135.558 85.908 134.952 84.078 134.139C82.515 133.45 80.932 132.618 79.359 131.651C78.567 131.168 77.775 130.654 76.994 130.109C76.603 129.831 76.213 129.554 75.822 129.266C74.598 128.371 73.385 127.395 72.192 126.346C71.864 126.048 71.535 125.75 71.206 125.441C70.877 125.143 70.548 124.835 70.229 124.537C69.426 123.766 68.645 122.964 67.884 122.131C67.586 121.813 67.288 121.484 66.989 121.144C66.167 120.219 65.365 119.263 64.604 118.265C64.305 117.905 64.028 117.535 63.75 117.165C62.712 115.788 61.725 114.348 60.799 112.857C60.553 112.456 60.306 112.044 60.07 111.644C59.782 111.161 59.505 110.668 59.227 110.174C58.199 108.323 57.252 106.401 56.43 104.416C56.307 104.128 56.183 103.84 56.08 103.553C55.915 103.183 55.771 102.802 55.638 102.432C55.433 101.887 55.238 101.342 55.052 100.797C54.867 100.252 54.693 99.697 54.518 99.142C54.353 98.607 54.199 98.073 54.055 97.528C53.89 96.952 53.737 96.366 53.603 95.77C53.592 95.708 53.572 95.647 53.562 95.585C53.367 94.763 53.192 93.93 53.038 93.087C52.832 91.976 52.668 90.845 52.544 89.704C52.493 89.344 52.462 88.984 52.431 88.624C52.39 88.244 52.36 87.873 52.339 87.493C52.287 86.804 52.256 86.105 52.235 85.406C52.225 84.953 52.214 84.501 52.214 84.049V52.784C52.214 29.682 70.937 10.95 94.039 10.929H94.08C97.268 10.929 100.372 11.288 103.353 11.957C106.078 12.574 108.7 13.458 111.188 14.579C114.581 16.101 117.737 18.054 120.575 20.388C122.96 22.342 125.13 24.542 127.021 26.968C132.607 34.083 135.938 43.038 135.938 52.784Z"
                                fill="#ECC19C"/>
                            <path
                                d="M148.613 200.741V200.751H39.538V200.741C39.538 194.583 40.556 188.65 42.448 183.129C42.787 182.132 43.157 181.145 43.558 180.168V180.158C43.958 179.181 44.38 178.225 44.832 177.279C46.632 173.485 48.873 169.938 51.474 166.689C52.132 165.877 52.8 165.085 53.49 164.324C53.829 163.933 54.189 163.553 54.549 163.173C54.909 162.803 55.269 162.433 55.639 162.063C57.48 160.223 59.453 158.537 61.531 156.984C62.569 156.213 63.618 155.493 64.708 154.794C65.798 154.105 66.908 153.447 68.039 152.83C68.06 152.81 68.08 152.81 68.08 152.81C68.522 152.574 68.954 152.317 69.386 152.049C70.24 151.535 71.082 150.98 71.885 150.384C72.296 150.096 72.687 149.798 73.077 149.479C74.002 148.739 74.896 147.947 75.75 147.114C76.027 146.837 76.306 146.559 76.583 146.271C77.158 145.674 77.703 145.047 78.228 144.41C78.486 144.102 78.743 143.783 78.979 143.464C79.226 143.146 79.462 142.817 79.699 142.487C81.529 139.937 82.999 137.131 84.079 134.138C85.385 130.498 86.094 126.581 86.094 122.489L94.042 122.53L102.215 122.571C102.215 126.611 102.904 130.487 104.179 134.086C105.239 137.088 106.708 139.895 108.508 142.445C110.379 145.097 112.61 147.462 115.139 149.487C115.52 149.796 115.9 150.094 116.281 150.371C116.651 150.649 117.031 150.916 117.422 151.173C117.505 151.235 117.576 151.286 117.659 151.338C118.029 151.585 118.399 151.832 118.79 152.058C119.211 152.315 119.644 152.572 120.075 152.809C120.146 152.829 120.209 152.86 120.26 152.902C121.165 153.406 122.06 153.93 122.934 154.475C123.355 154.732 123.777 154.999 124.188 155.298C125.042 155.853 125.875 156.439 126.686 157.056C126.686 157.067 126.697 157.067 126.697 157.067H126.707C128.784 158.619 130.748 160.315 132.588 162.146C142.496 172.015 148.613 185.648 148.613 200.741Z"
                                fill="#ECC19C"/>
                            <path
                                d="M148.614 200.743H39.539C39.539 194.584 40.558 188.652 42.449 183.131C42.788 182.133 43.158 181.147 43.559 180.17C43.548 180.159 43.559 180.159 43.559 180.159C43.95 179.182 44.381 178.226 44.833 177.281C46.633 173.487 48.874 169.94 51.475 166.691C52.133 165.878 52.802 165.087 53.491 164.326C53.83 163.935 54.19 163.555 54.55 163.175C54.91 162.805 55.27 162.435 55.64 162.065C57.481 160.225 59.454 158.538 61.532 156.986C62.57 156.215 63.619 155.495 64.709 154.796C65.799 154.097 66.909 153.439 68.04 152.822C68.061 152.802 68.081 152.812 68.081 152.812V152.802C68.523 152.555 68.955 152.308 69.387 152.051C70.672 151.27 71.907 150.406 73.058 149.46C73.068 149.47 73.068 149.47 73.079 149.48C78.404 154.929 85.817 158.311 94.043 158.332H94.125C102.35 158.332 109.794 154.939 115.14 149.49L115.151 149.48C115.88 150.086 116.641 150.652 117.423 151.176C117.505 151.237 117.577 151.289 117.659 151.34C118.029 151.587 118.409 151.823 118.79 152.06C119.212 152.317 119.644 152.564 120.075 152.8C120.147 152.82 120.198 152.861 120.26 152.892C121.165 153.396 122.06 153.92 122.934 154.475C123.355 154.732 123.777 154.999 124.188 155.298C125.042 155.843 125.875 156.439 126.686 157.056H126.707C128.795 158.619 130.758 160.315 132.588 162.145C142.497 172.017 148.614 185.65 148.614 200.743Z"
                                fill="#C7D4E2"/>
                            <path
                                d="M135.938 84.05C135.938 84.503 135.927 84.955 135.917 85.407C135.897 86.343 135.845 87.278 135.763 88.203C135.743 88.522 135.711 88.84 135.67 89.159C135.536 90.485 135.352 91.791 135.115 93.087C135.032 93.519 134.95 93.94 134.857 94.362C134.847 94.454 134.827 94.537 134.806 94.619C134.723 95.051 134.62 95.473 134.518 95.894C134.466 96.141 134.405 96.377 134.332 96.614C134.302 96.799 134.25 96.984 134.199 97.159C133.982 98.002 133.736 98.825 133.478 99.647C133.355 100.038 133.232 100.418 133.098 100.809C133.087 100.85 133.067 100.891 133.057 100.932C132.933 101.281 132.81 101.631 132.687 101.98C132.646 102.083 132.605 102.185 132.563 102.299C132.44 102.628 132.317 102.957 132.183 103.286C132.029 103.687 131.865 104.078 131.7 104.469C131.556 104.819 131.402 105.168 131.248 105.518C131.228 105.58 131.196 105.631 131.176 105.692C131.001 106.062 130.837 106.433 130.662 106.792C130.487 107.172 130.302 107.553 130.106 107.934C129.736 108.684 129.335 109.435 128.934 110.165C128.749 110.494 128.564 110.823 128.378 111.152C126.795 113.877 125.037 116.437 123.125 118.801C122.867 119.14 122.601 119.469 122.323 119.788C121.942 120.25 121.551 120.703 121.161 121.145C120.811 121.536 120.462 121.926 120.102 122.307C119.115 123.366 118.107 124.374 117.079 125.32C116.874 125.526 116.657 125.711 116.441 125.906C116.092 126.225 115.743 126.533 115.382 126.831C115.105 127.078 114.817 127.314 114.528 127.551C113.788 128.157 113.048 128.743 112.298 129.288C111.989 129.525 111.67 129.751 111.352 129.967C110.838 130.337 110.314 130.687 109.789 131.026C109.501 131.221 109.203 131.406 108.904 131.581C107.855 132.229 106.797 132.825 105.748 133.339C105.491 133.472 105.234 133.596 104.977 133.719C104.719 133.842 104.453 133.966 104.175 134.089C103.835 134.243 103.496 134.387 103.157 134.521C103.023 134.583 102.889 134.634 102.756 134.675C102.356 134.84 101.944 134.994 101.543 135.127C101.039 135.312 100.525 135.466 100.022 135.61C99.672 135.713 99.313 135.805 98.963 135.887C98.942 135.898 98.922 135.908 98.891 135.908C98.541 135.99 98.192 136.073 97.842 136.134C97.749 136.155 97.658 136.175 97.565 136.185C97.277 136.236 96.989 136.288 96.701 136.319C96.29 136.381 95.879 136.432 95.468 136.453C95.325 136.473 95.191 136.484 95.046 136.484C94.718 136.505 94.389 136.515 94.069 136.515H94.039C93.72 136.515 93.401 136.505 93.083 136.484C92.959 136.484 92.836 136.474 92.712 136.453C92.425 136.443 92.126 136.411 91.818 136.37C91.756 136.37 91.684 136.36 91.623 136.35C91.242 136.299 90.862 136.237 90.471 136.165C90.143 136.114 89.814 136.041 89.474 135.959C87.716 135.558 85.907 134.952 84.077 134.139C82.514 133.45 80.931 132.618 79.358 131.651C78.566 131.178 77.785 130.664 76.993 130.109C76.602 129.831 76.212 129.554 75.821 129.266C74.597 128.371 73.384 127.395 72.191 126.346C71.863 126.048 71.534 125.75 71.205 125.441C70.876 125.143 70.547 124.835 70.228 124.537C69.425 123.766 68.644 122.964 67.883 122.131C67.585 121.813 67.287 121.484 66.988 121.144C66.166 120.219 65.364 119.263 64.603 118.265C64.304 117.905 64.027 117.535 63.749 117.165C62.711 115.788 61.724 114.348 60.798 112.857C60.552 112.456 60.305 112.044 60.069 111.644C59.781 111.161 59.504 110.668 59.226 110.174C58.198 108.323 57.251 106.401 56.429 104.416C56.306 104.128 56.182 103.84 56.079 103.553C55.914 103.183 55.77 102.802 55.637 102.432C55.432 101.887 55.237 101.342 55.051 100.797C54.866 100.252 54.692 99.697 54.517 99.142C54.352 98.607 54.198 98.073 54.054 97.528C53.889 96.952 53.736 96.366 53.602 95.77C53.591 95.708 53.571 95.647 53.561 95.585C53.366 94.763 53.191 93.93 53.037 93.087C52.831 91.976 52.667 90.845 52.543 89.704C52.492 89.344 52.461 88.984 52.43 88.624C52.389 88.244 52.359 87.873 52.338 87.493C52.286 86.804 52.255 86.105 52.234 85.406C52.224 84.953 52.213 84.501 52.213 84.049L58.897 97.189L70.381 102.196L83.962 103.42L94.038 104.335H94.1L103.528 105.189L124.533 107.081L135.938 84.05Z"
                                fill="#543E36"/>
                            <path
                                d="M127.023 26.968C124.977 31.605 122.314 35.913 119.168 39.82C118.983 40.047 118.798 40.273 118.603 40.499C112.157 48.261 103.706 54.297 94.041 57.823C91.501 58.759 88.88 59.519 86.186 60.085C84.387 60.465 82.557 60.764 80.696 60.98C78.557 61.216 76.378 61.34 74.168 61.34C71.639 61.34 69.161 61.175 66.725 60.857C64.339 60.559 62.005 60.117 59.723 59.521C58.417 59.192 57.142 58.812 55.877 58.39C54.633 57.979 53.42 57.526 52.217 57.033V52.787C52.217 29.685 70.94 10.953 94.042 10.932H94.083C97.271 10.932 100.375 11.291 103.356 11.96C106.081 12.577 108.703 13.461 111.191 14.582C114.584 16.104 117.74 18.057 120.578 20.391C122.962 22.341 125.132 24.542 127.023 26.968Z"
                                fill="#543E36"/>
                            <path
                                d="M135.938 52.784V61.019C128.802 55.498 122.891 48.517 118.624 40.539C118.614 40.529 118.614 40.508 118.603 40.498C114.409 32.664 111.807 23.873 111.191 14.578C114.584 16.1 117.74 18.053 120.578 20.387C122.963 22.341 125.133 24.541 127.024 26.967C132.607 34.083 135.938 43.038 135.938 52.784Z"
                                fill="#543E36"/>
                            <path
                                d="M57.12 56.013C56.679 56.784 56.277 57.576 55.876 58.388C55.723 58.706 55.568 59.046 55.414 59.375C53.389 63.878 52.37 68.299 52.226 72.289C52.226 72.402 52.215 72.525 52.215 72.639V56.517C52.215 55.941 52.236 55.375 52.236 54.82C53.861 55.242 55.485 55.653 57.12 56.013Z"
                                fill="#543E36"/>
                            <path
                                d="M131.054 56.013C131.676 57.106 132.231 58.226 132.764 59.374C134.852 64.017 135.874 68.552 135.962 72.642V56.512C135.962 55.945 135.941 55.378 135.941 54.824C134.318 55.243 132.697 55.648 131.054 56.013Z"
                                fill="#543E36"/>
                            <path
                                d="M135.909 63.71C135.909 63.5094 135.757 63.3329 135.558 63.3088C133.877 63.0498 126.307 62 118.167 62C108.927 62 97.0025 64.9225 94.9236 64.9225H93.0787C92.1085 64.9225 89.0026 64.2864 85.0311 63.6148C80.4643 62.8366 74.7648 62 69.8356 62C63.8794 62 58.2254 62.5662 54.9673 62.9662C53.7756 63.1083 52.8997 63.2366 52.4442 63.3077C52.2454 63.3318 52.0932 63.5083 52.0932 63.7088L52 68.7161C52 68.8926 52.1057 69.0462 52.2681 69.1172L52.8282 69.3178C53.6575 69.6364 53.5882 84.7304 58.0493 88.501C60.7008 90.7278 63.0603 92 72.9994 92C78.7579 92 82.3785 90.4333 85.8127 85.755C88.2892 82.3969 90.484 74.4545 90.484 74.4545C91.1497 71.179 93.5672 70.92 93.9534 70.8959C93.9773 70.8959 94 70.8959 94 70.8959C94.0807 70.8959 96.8037 70.9429 97.516 74.4545C97.516 74.4545 99.7119 82.3969 102.187 85.755C105.62 90.4333 109.242 92 114.999 92C124.94 92 127.298 90.7278 129.95 88.501C134.412 84.7304 134.341 69.6364 135.171 69.3178L135.732 69.1172C135.894 69.0462 136 68.8937 136 68.7161L135.909 63.71ZM85.8138 81.5729C84.354 85.0604 80.5813 89.5623 75.2669 89.8328C59.324 90.6453 58.5878 86.1561 57.5597 82.5975C56.5202 79.0389 56.2521 75.9158 56.66 72.3572C57.0803 68.7986 57.9687 66.7127 59.5693 65.664C60.2578 65.2045 61.0064 64.7919 62.9217 64.4973C64.6383 64.2383 67.2898 64.0847 71.7044 64.0847C74.2616 64.0847 76.6563 64.2853 78.7932 64.6383C84.4699 65.5575 88.3006 67.5024 88.3006 69.4221C88.3006 70.732 87.9734 76.4109 85.8138 81.5729ZM130.441 82.5975C129.414 86.1561 128.678 90.6453 112.735 89.8328C107.421 89.5623 103.648 85.0604 102.188 81.5729C100.028 76.4121 99.7017 70.732 99.7017 69.4244C99.7017 66.7849 106.967 64.0859 116.298 64.0859C125.63 64.0859 127.124 64.793 128.434 65.6652C130.034 66.7139 130.921 68.7997 131.342 72.3583C131.751 75.9169 131.482 79.04 130.441 82.5975Z"
                                fill="#2D3748"/>
                            <path
                                d="M94.123 90.65L94.112 100.788L94.102 104.335V107.121L94.091 116.374V116.384L94.081 116.374H94.07L94.04 116.353L53.604 95.771C53.593 95.709 53.573 95.648 53.563 95.586C53.368 94.764 53.193 93.931 53.039 93.088C52.833 91.977 52.669 90.846 52.545 89.705C52.494 89.345 52.463 88.985 52.432 88.625C52.391 88.245 52.361 87.874 52.34 87.494C52.288 86.805 52.257 86.106 52.236 85.407C52.226 84.954 52.215 84.502 52.215 84.05V71.764C52.215 71.939 52.226 72.114 52.226 72.288C52.308 75.259 52.781 78.529 53.696 81.87C54.406 84.44 55.29 86.815 56.318 88.933V88.943C59.012 94.547 62.621 98.35 65.941 98.967C66.147 98.998 66.363 99.018 66.569 99.039C67.854 99.183 69.201 99.265 70.589 99.265C75.832 99.265 80.49 95.05 83.42 93.343C83.441 93.333 83.461 93.322 83.482 93.312C83.636 93.219 83.791 93.127 83.924 93.034C83.965 93.003 84.006 92.983 84.047 92.962C86.515 91.553 90.072 90.659 94.041 90.649H94.123V90.65Z"
                                fill="#543E36"/>
                            <path
                                d="M135.947 71.764L135.937 84.05C135.937 87.135 135.649 90.157 135.115 93.088C134.898 94.26 134.652 95.421 134.364 96.573L124.874 110.278L94.092 116.375H94.082L94.071 116.385V116.375L94.041 90.648H94.123C98.092 90.658 101.659 91.553 104.127 92.961C104.168 92.982 104.198 93.002 104.24 93.033C104.384 93.126 104.538 93.218 104.692 93.311C104.702 93.321 104.722 93.332 104.743 93.342C107.684 95.049 112.331 99.267 117.575 99.267C118.963 99.267 120.309 99.185 121.594 99.041C121.81 99.02 122.016 99 122.232 98.969C125.543 98.352 129.162 94.548 131.845 88.945V88.935C132.872 86.817 133.757 84.442 134.466 81.872C135.392 78.479 135.875 75.169 135.937 72.156C135.947 72.021 135.947 71.897 135.947 71.764Z"
                                fill="#543E36"/>
                            <path
                                d="M94.074 107.125C99.7377 107.125 104.329 105.706 104.329 103.955C104.329 102.204 99.7377 100.785 94.074 100.785C88.4103 100.785 83.819 102.204 83.819 103.955C83.819 105.706 88.4103 107.125 94.074 107.125Z"
                                fill="#ECC19C"/>
                            <path
                                d="M64.131 155.174V211.732H59.762V158.362C60.348 157.889 60.934 157.426 61.531 156.984C62.384 156.347 63.247 155.75 64.131 155.174Z"
                                fill="#435363"/>
                            <path d="M124.021 155.185V200.741V211.732H128.39V200.741V158.372L124.021 155.185Z"
                                  fill="#435363"/>
                            <path d="M82.113 151.713L94.074 166.049L106.036 151.713H82.113Z" fill="#1A202C"/>
                            <path
                                d="M94.074 225.437H87.001L92.111 159.637C92.326 160.474 95.823 160.474 96.038 159.637L101.148 225.437H94.074Z"
                                fill="#1A202C"/>
                            <path
                                d="M94.07 151.638L94.04 151.689L94.029 151.71L89.063 160.048L84.426 167.82L71.872 150.373C72.273 150.085 72.674 149.777 73.055 149.458C73.065 149.468 73.065 149.468 73.076 149.479C75.594 147.474 77.836 145.12 79.697 142.488L94.04 151.618L94.07 151.638Z"
                                fill="#E7ECF2"/>
                            <path
                                d="M116.278 150.373L103.724 167.82L99.087 160.048L94.11 151.71L94.069 151.638L108.505 142.447C110.376 145.099 112.607 147.464 115.136 149.489C115.518 149.797 115.897 150.096 116.278 150.373Z"
                                fill="#E7ECF2"/>
                        </g>
                        <defs>
                            <clipPath id="clip0">
                                <rect width="188.148" height="188.148" fill="white"/>
                            </clipPath>
                        </defs>
                    </svg>
                </div>
            </div>
        </section>
    </footer>
</div>
</body>
</html>


{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--    <head>--}}
{{--        <meta charset="utf-8">--}}
{{--        <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--        <title>Laravel</title>--}}
{{--        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">--}}

{{--        <style>--}}
{{--            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}--}}
{{--        </style>--}}

{{--        <style>--}}
{{--            body {--}}
{{--                font-family: 'Nunito', sans-serif;--}}
{{--            }--}}
{{--        </style>--}}
{{--        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">--}}
{{--            @if (Route::has('login'))--}}
{{--                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">--}}
{{--                    @auth--}}
{{--                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{trans('Dashboard')}}</a>--}}
{{--                    @else--}}
{{--                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{trans('Log in')}}</a>--}}

{{--                        @if (Route::has('register'))--}}
{{--                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">{{trans('Register')}}</a>--}}
{{--                        @endif--}}
{{--                    @endauth--}}
{{--                </div>--}}
{{--            @endif--}}
{{--                <div>--}}
{{--                    <div class="container mx-auto px-6 sm:px-12 flex flex-col-reverse sm:flex-row relative">--}}

{{--                    </div>--}}
{{--                </div>--}}
{{--        </div>--}}
{{--    </head>--}}
{{--    <body class="antialiased">--}}
{{--    <section class="bg-white mt-20">--}}
{{--        <div class="max-w-2xl px-6 text-center mx-auto">--}}
{{--            <h2 class="text-3xl font-semibold text-gray-800">Hola!!, <span class="bg-indigo-600 text-white rounded px-1">Yo soy Alejandro</span> . Un gusto en conocerte.</h2>--}}
{{--            <p class="text-gray-600 mt-4">Esta es mi proyecto para la emprempresa Evertec, espero que te guste todo lo que hice.</p>--}}

{{--            <div class="flex items-end justify-center mt-16">--}}
{{--                <svg width="189" height="188" viewBox="0 0 189 188" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                    <g clip-path="url(#clip0)">--}}
{{--                        <path d="M94.074 188.148C146.03 188.148 188.148 146.03 188.148 94.074C188.148 42.1184 146.03 0 94.074 0C42.1184 0 0 42.1184 0 94.074C0 146.03 42.1184 188.148 94.074 188.148Z" fill="#2D3748"/>--}}
{{--                        <path d="M135.938 52.784V84.05C135.938 84.503 135.927 84.955 135.917 85.407C135.897 86.343 135.845 87.278 135.763 88.203C135.743 88.522 135.711 88.84 135.67 89.159C135.536 90.485 135.352 91.791 135.115 93.087C135.032 93.519 134.95 93.94 134.857 94.362C134.847 94.454 134.827 94.537 134.806 94.619C134.723 95.051 134.62 95.473 134.518 95.894C134.477 96.12 134.415 96.346 134.364 96.573C134.312 96.768 134.261 96.964 134.2 97.159C133.983 98.002 133.737 98.825 133.479 99.647C133.356 100.038 133.233 100.418 133.099 100.809C133.088 100.85 133.068 100.891 133.058 100.932C132.934 101.281 132.811 101.631 132.688 101.98C132.647 102.083 132.606 102.185 132.564 102.299C132.441 102.628 132.318 102.957 132.184 103.286C132.03 103.687 131.866 104.078 131.701 104.469C131.557 104.819 131.403 105.168 131.249 105.518C131.229 105.58 131.197 105.631 131.177 105.692C131.002 106.062 130.838 106.433 130.663 106.792C130.488 107.172 130.303 107.553 130.107 107.934C129.737 108.684 129.336 109.435 128.935 110.165C128.75 110.494 128.565 110.823 128.379 111.152C126.796 113.877 125.038 116.437 123.126 118.801C122.868 119.14 122.602 119.469 122.324 119.788C121.943 120.25 121.552 120.703 121.162 121.145C120.812 121.536 120.463 121.926 120.103 122.307C119.116 123.366 118.108 124.374 117.08 125.32C116.875 125.526 116.658 125.711 116.442 125.906C116.093 126.225 115.744 126.533 115.383 126.831C115.106 127.078 114.818 127.314 114.529 127.551C113.789 128.157 113.049 128.743 112.299 129.288C111.99 129.525 111.671 129.751 111.353 129.967C110.839 130.337 110.315 130.687 109.79 131.026C109.502 131.221 109.204 131.406 108.905 131.581C107.856 132.229 106.798 132.825 105.749 133.339C105.492 133.472 105.235 133.596 104.978 133.719C104.72 133.842 104.454 133.966 104.176 134.089C103.836 134.243 103.497 134.387 103.158 134.521C103.024 134.583 102.89 134.634 102.757 134.675C102.357 134.84 101.945 134.994 101.544 135.127C101.04 135.312 100.526 135.466 100.023 135.61C99.673 135.713 99.314 135.805 98.964 135.887C98.943 135.898 98.923 135.908 98.892 135.908C98.542 135.99 98.193 136.073 97.843 136.134C97.75 136.155 97.659 136.175 97.566 136.185C97.278 136.236 96.99 136.288 96.702 136.319C96.291 136.381 95.88 136.432 95.469 136.453C95.326 136.473 95.192 136.484 95.047 136.484C94.719 136.505 94.39 136.515 94.07 136.515H94.04C93.721 136.515 93.402 136.505 93.084 136.484C92.96 136.484 92.837 136.474 92.713 136.453C92.426 136.443 92.127 136.411 91.819 136.37C91.757 136.37 91.685 136.36 91.624 136.35C91.243 136.299 90.863 136.237 90.472 136.165C90.144 136.114 89.815 136.041 89.475 135.959C87.717 135.558 85.908 134.952 84.078 134.139C82.515 133.45 80.932 132.618 79.359 131.651C78.567 131.168 77.775 130.654 76.994 130.109C76.603 129.831 76.213 129.554 75.822 129.266C74.598 128.371 73.385 127.395 72.192 126.346C71.864 126.048 71.535 125.75 71.206 125.441C70.877 125.143 70.548 124.835 70.229 124.537C69.426 123.766 68.645 122.964 67.884 122.131C67.586 121.813 67.288 121.484 66.989 121.144C66.167 120.219 65.365 119.263 64.604 118.265C64.305 117.905 64.028 117.535 63.75 117.165C62.712 115.788 61.725 114.348 60.799 112.857C60.553 112.456 60.306 112.044 60.07 111.644C59.782 111.161 59.505 110.668 59.227 110.174C58.199 108.323 57.252 106.401 56.43 104.416C56.307 104.128 56.183 103.84 56.08 103.553C55.915 103.183 55.771 102.802 55.638 102.432C55.433 101.887 55.238 101.342 55.052 100.797C54.867 100.252 54.693 99.697 54.518 99.142C54.353 98.607 54.199 98.073 54.055 97.528C53.89 96.952 53.737 96.366 53.603 95.77C53.592 95.708 53.572 95.647 53.562 95.585C53.367 94.763 53.192 93.93 53.038 93.087C52.832 91.976 52.668 90.845 52.544 89.704C52.493 89.344 52.462 88.984 52.431 88.624C52.39 88.244 52.36 87.873 52.339 87.493C52.287 86.804 52.256 86.105 52.235 85.406C52.225 84.953 52.214 84.501 52.214 84.049V52.784C52.214 29.682 70.937 10.95 94.039 10.929H94.08C97.268 10.929 100.372 11.288 103.353 11.957C106.078 12.574 108.7 13.458 111.188 14.579C114.581 16.101 117.737 18.054 120.575 20.388C122.96 22.342 125.13 24.542 127.021 26.968C132.607 34.083 135.938 43.038 135.938 52.784Z" fill="#ECC19C"/>--}}
{{--                        <path d="M148.613 200.741V200.751H39.538V200.741C39.538 194.583 40.556 188.65 42.448 183.129C42.787 182.132 43.157 181.145 43.558 180.168V180.158C43.958 179.181 44.38 178.225 44.832 177.279C46.632 173.485 48.873 169.938 51.474 166.689C52.132 165.877 52.8 165.085 53.49 164.324C53.829 163.933 54.189 163.553 54.549 163.173C54.909 162.803 55.269 162.433 55.639 162.063C57.48 160.223 59.453 158.537 61.531 156.984C62.569 156.213 63.618 155.493 64.708 154.794C65.798 154.105 66.908 153.447 68.039 152.83C68.06 152.81 68.08 152.81 68.08 152.81C68.522 152.574 68.954 152.317 69.386 152.049C70.24 151.535 71.082 150.98 71.885 150.384C72.296 150.096 72.687 149.798 73.077 149.479C74.002 148.739 74.896 147.947 75.75 147.114C76.027 146.837 76.306 146.559 76.583 146.271C77.158 145.674 77.703 145.047 78.228 144.41C78.486 144.102 78.743 143.783 78.979 143.464C79.226 143.146 79.462 142.817 79.699 142.487C81.529 139.937 82.999 137.131 84.079 134.138C85.385 130.498 86.094 126.581 86.094 122.489L94.042 122.53L102.215 122.571C102.215 126.611 102.904 130.487 104.179 134.086C105.239 137.088 106.708 139.895 108.508 142.445C110.379 145.097 112.61 147.462 115.139 149.487C115.52 149.796 115.9 150.094 116.281 150.371C116.651 150.649 117.031 150.916 117.422 151.173C117.505 151.235 117.576 151.286 117.659 151.338C118.029 151.585 118.399 151.832 118.79 152.058C119.211 152.315 119.644 152.572 120.075 152.809C120.146 152.829 120.209 152.86 120.26 152.902C121.165 153.406 122.06 153.93 122.934 154.475C123.355 154.732 123.777 154.999 124.188 155.298C125.042 155.853 125.875 156.439 126.686 157.056C126.686 157.067 126.697 157.067 126.697 157.067H126.707C128.784 158.619 130.748 160.315 132.588 162.146C142.496 172.015 148.613 185.648 148.613 200.741Z" fill="#ECC19C"/>--}}
{{--                        <path d="M148.614 200.743H39.539C39.539 194.584 40.558 188.652 42.449 183.131C42.788 182.133 43.158 181.147 43.559 180.17C43.548 180.159 43.559 180.159 43.559 180.159C43.95 179.182 44.381 178.226 44.833 177.281C46.633 173.487 48.874 169.94 51.475 166.691C52.133 165.878 52.802 165.087 53.491 164.326C53.83 163.935 54.19 163.555 54.55 163.175C54.91 162.805 55.27 162.435 55.64 162.065C57.481 160.225 59.454 158.538 61.532 156.986C62.57 156.215 63.619 155.495 64.709 154.796C65.799 154.097 66.909 153.439 68.04 152.822C68.061 152.802 68.081 152.812 68.081 152.812V152.802C68.523 152.555 68.955 152.308 69.387 152.051C70.672 151.27 71.907 150.406 73.058 149.46C73.068 149.47 73.068 149.47 73.079 149.48C78.404 154.929 85.817 158.311 94.043 158.332H94.125C102.35 158.332 109.794 154.939 115.14 149.49L115.151 149.48C115.88 150.086 116.641 150.652 117.423 151.176C117.505 151.237 117.577 151.289 117.659 151.34C118.029 151.587 118.409 151.823 118.79 152.06C119.212 152.317 119.644 152.564 120.075 152.8C120.147 152.82 120.198 152.861 120.26 152.892C121.165 153.396 122.06 153.92 122.934 154.475C123.355 154.732 123.777 154.999 124.188 155.298C125.042 155.843 125.875 156.439 126.686 157.056H126.707C128.795 158.619 130.758 160.315 132.588 162.145C142.497 172.017 148.614 185.65 148.614 200.743Z" fill="#C7D4E2"/>--}}
{{--                        <path d="M135.938 84.05C135.938 84.503 135.927 84.955 135.917 85.407C135.897 86.343 135.845 87.278 135.763 88.203C135.743 88.522 135.711 88.84 135.67 89.159C135.536 90.485 135.352 91.791 135.115 93.087C135.032 93.519 134.95 93.94 134.857 94.362C134.847 94.454 134.827 94.537 134.806 94.619C134.723 95.051 134.62 95.473 134.518 95.894C134.466 96.141 134.405 96.377 134.332 96.614C134.302 96.799 134.25 96.984 134.199 97.159C133.982 98.002 133.736 98.825 133.478 99.647C133.355 100.038 133.232 100.418 133.098 100.809C133.087 100.85 133.067 100.891 133.057 100.932C132.933 101.281 132.81 101.631 132.687 101.98C132.646 102.083 132.605 102.185 132.563 102.299C132.44 102.628 132.317 102.957 132.183 103.286C132.029 103.687 131.865 104.078 131.7 104.469C131.556 104.819 131.402 105.168 131.248 105.518C131.228 105.58 131.196 105.631 131.176 105.692C131.001 106.062 130.837 106.433 130.662 106.792C130.487 107.172 130.302 107.553 130.106 107.934C129.736 108.684 129.335 109.435 128.934 110.165C128.749 110.494 128.564 110.823 128.378 111.152C126.795 113.877 125.037 116.437 123.125 118.801C122.867 119.14 122.601 119.469 122.323 119.788C121.942 120.25 121.551 120.703 121.161 121.145C120.811 121.536 120.462 121.926 120.102 122.307C119.115 123.366 118.107 124.374 117.079 125.32C116.874 125.526 116.657 125.711 116.441 125.906C116.092 126.225 115.743 126.533 115.382 126.831C115.105 127.078 114.817 127.314 114.528 127.551C113.788 128.157 113.048 128.743 112.298 129.288C111.989 129.525 111.67 129.751 111.352 129.967C110.838 130.337 110.314 130.687 109.789 131.026C109.501 131.221 109.203 131.406 108.904 131.581C107.855 132.229 106.797 132.825 105.748 133.339C105.491 133.472 105.234 133.596 104.977 133.719C104.719 133.842 104.453 133.966 104.175 134.089C103.835 134.243 103.496 134.387 103.157 134.521C103.023 134.583 102.889 134.634 102.756 134.675C102.356 134.84 101.944 134.994 101.543 135.127C101.039 135.312 100.525 135.466 100.022 135.61C99.672 135.713 99.313 135.805 98.963 135.887C98.942 135.898 98.922 135.908 98.891 135.908C98.541 135.99 98.192 136.073 97.842 136.134C97.749 136.155 97.658 136.175 97.565 136.185C97.277 136.236 96.989 136.288 96.701 136.319C96.29 136.381 95.879 136.432 95.468 136.453C95.325 136.473 95.191 136.484 95.046 136.484C94.718 136.505 94.389 136.515 94.069 136.515H94.039C93.72 136.515 93.401 136.505 93.083 136.484C92.959 136.484 92.836 136.474 92.712 136.453C92.425 136.443 92.126 136.411 91.818 136.37C91.756 136.37 91.684 136.36 91.623 136.35C91.242 136.299 90.862 136.237 90.471 136.165C90.143 136.114 89.814 136.041 89.474 135.959C87.716 135.558 85.907 134.952 84.077 134.139C82.514 133.45 80.931 132.618 79.358 131.651C78.566 131.178 77.785 130.664 76.993 130.109C76.602 129.831 76.212 129.554 75.821 129.266C74.597 128.371 73.384 127.395 72.191 126.346C71.863 126.048 71.534 125.75 71.205 125.441C70.876 125.143 70.547 124.835 70.228 124.537C69.425 123.766 68.644 122.964 67.883 122.131C67.585 121.813 67.287 121.484 66.988 121.144C66.166 120.219 65.364 119.263 64.603 118.265C64.304 117.905 64.027 117.535 63.749 117.165C62.711 115.788 61.724 114.348 60.798 112.857C60.552 112.456 60.305 112.044 60.069 111.644C59.781 111.161 59.504 110.668 59.226 110.174C58.198 108.323 57.251 106.401 56.429 104.416C56.306 104.128 56.182 103.84 56.079 103.553C55.914 103.183 55.77 102.802 55.637 102.432C55.432 101.887 55.237 101.342 55.051 100.797C54.866 100.252 54.692 99.697 54.517 99.142C54.352 98.607 54.198 98.073 54.054 97.528C53.889 96.952 53.736 96.366 53.602 95.77C53.591 95.708 53.571 95.647 53.561 95.585C53.366 94.763 53.191 93.93 53.037 93.087C52.831 91.976 52.667 90.845 52.543 89.704C52.492 89.344 52.461 88.984 52.43 88.624C52.389 88.244 52.359 87.873 52.338 87.493C52.286 86.804 52.255 86.105 52.234 85.406C52.224 84.953 52.213 84.501 52.213 84.049L58.897 97.189L70.381 102.196L83.962 103.42L94.038 104.335H94.1L103.528 105.189L124.533 107.081L135.938 84.05Z" fill="#543E36"/>--}}
{{--                        <path d="M127.023 26.968C124.977 31.605 122.314 35.913 119.168 39.82C118.983 40.047 118.798 40.273 118.603 40.499C112.157 48.261 103.706 54.297 94.041 57.823C91.501 58.759 88.88 59.519 86.186 60.085C84.387 60.465 82.557 60.764 80.696 60.98C78.557 61.216 76.378 61.34 74.168 61.34C71.639 61.34 69.161 61.175 66.725 60.857C64.339 60.559 62.005 60.117 59.723 59.521C58.417 59.192 57.142 58.812 55.877 58.39C54.633 57.979 53.42 57.526 52.217 57.033V52.787C52.217 29.685 70.94 10.953 94.042 10.932H94.083C97.271 10.932 100.375 11.291 103.356 11.96C106.081 12.577 108.703 13.461 111.191 14.582C114.584 16.104 117.74 18.057 120.578 20.391C122.962 22.341 125.132 24.542 127.023 26.968Z" fill="#543E36"/>--}}
{{--                        <path d="M135.938 52.784V61.019C128.802 55.498 122.891 48.517 118.624 40.539C118.614 40.529 118.614 40.508 118.603 40.498C114.409 32.664 111.807 23.873 111.191 14.578C114.584 16.1 117.74 18.053 120.578 20.387C122.963 22.341 125.133 24.541 127.024 26.967C132.607 34.083 135.938 43.038 135.938 52.784Z" fill="#543E36"/>--}}
{{--                        <path d="M57.12 56.013C56.679 56.784 56.277 57.576 55.876 58.388C55.723 58.706 55.568 59.046 55.414 59.375C53.389 63.878 52.37 68.299 52.226 72.289C52.226 72.402 52.215 72.525 52.215 72.639V56.517C52.215 55.941 52.236 55.375 52.236 54.82C53.861 55.242 55.485 55.653 57.12 56.013Z" fill="#543E36"/>--}}
{{--                        <path d="M131.054 56.013C131.676 57.106 132.231 58.226 132.764 59.374C134.852 64.017 135.874 68.552 135.962 72.642V56.512C135.962 55.945 135.941 55.378 135.941 54.824C134.318 55.243 132.697 55.648 131.054 56.013Z" fill="#543E36"/>--}}
{{--                        <path d="M135.909 63.71C135.909 63.5094 135.757 63.3329 135.558 63.3088C133.877 63.0498 126.307 62 118.167 62C108.927 62 97.0025 64.9225 94.9236 64.9225H93.0787C92.1085 64.9225 89.0026 64.2864 85.0311 63.6148C80.4643 62.8366 74.7648 62 69.8356 62C63.8794 62 58.2254 62.5662 54.9673 62.9662C53.7756 63.1083 52.8997 63.2366 52.4442 63.3077C52.2454 63.3318 52.0932 63.5083 52.0932 63.7088L52 68.7161C52 68.8926 52.1057 69.0462 52.2681 69.1172L52.8282 69.3178C53.6575 69.6364 53.5882 84.7304 58.0493 88.501C60.7008 90.7278 63.0603 92 72.9994 92C78.7579 92 82.3785 90.4333 85.8127 85.755C88.2892 82.3969 90.484 74.4545 90.484 74.4545C91.1497 71.179 93.5672 70.92 93.9534 70.8959C93.9773 70.8959 94 70.8959 94 70.8959C94.0807 70.8959 96.8037 70.9429 97.516 74.4545C97.516 74.4545 99.7119 82.3969 102.187 85.755C105.62 90.4333 109.242 92 114.999 92C124.94 92 127.298 90.7278 129.95 88.501C134.412 84.7304 134.341 69.6364 135.171 69.3178L135.732 69.1172C135.894 69.0462 136 68.8937 136 68.7161L135.909 63.71ZM85.8138 81.5729C84.354 85.0604 80.5813 89.5623 75.2669 89.8328C59.324 90.6453 58.5878 86.1561 57.5597 82.5975C56.5202 79.0389 56.2521 75.9158 56.66 72.3572C57.0803 68.7986 57.9687 66.7127 59.5693 65.664C60.2578 65.2045 61.0064 64.7919 62.9217 64.4973C64.6383 64.2383 67.2898 64.0847 71.7044 64.0847C74.2616 64.0847 76.6563 64.2853 78.7932 64.6383C84.4699 65.5575 88.3006 67.5024 88.3006 69.4221C88.3006 70.732 87.9734 76.4109 85.8138 81.5729ZM130.441 82.5975C129.414 86.1561 128.678 90.6453 112.735 89.8328C107.421 89.5623 103.648 85.0604 102.188 81.5729C100.028 76.4121 99.7017 70.732 99.7017 69.4244C99.7017 66.7849 106.967 64.0859 116.298 64.0859C125.63 64.0859 127.124 64.793 128.434 65.6652C130.034 66.7139 130.921 68.7997 131.342 72.3583C131.751 75.9169 131.482 79.04 130.441 82.5975Z" fill="#2D3748"/>--}}
{{--                        <path d="M94.123 90.65L94.112 100.788L94.102 104.335V107.121L94.091 116.374V116.384L94.081 116.374H94.07L94.04 116.353L53.604 95.771C53.593 95.709 53.573 95.648 53.563 95.586C53.368 94.764 53.193 93.931 53.039 93.088C52.833 91.977 52.669 90.846 52.545 89.705C52.494 89.345 52.463 88.985 52.432 88.625C52.391 88.245 52.361 87.874 52.34 87.494C52.288 86.805 52.257 86.106 52.236 85.407C52.226 84.954 52.215 84.502 52.215 84.05V71.764C52.215 71.939 52.226 72.114 52.226 72.288C52.308 75.259 52.781 78.529 53.696 81.87C54.406 84.44 55.29 86.815 56.318 88.933V88.943C59.012 94.547 62.621 98.35 65.941 98.967C66.147 98.998 66.363 99.018 66.569 99.039C67.854 99.183 69.201 99.265 70.589 99.265C75.832 99.265 80.49 95.05 83.42 93.343C83.441 93.333 83.461 93.322 83.482 93.312C83.636 93.219 83.791 93.127 83.924 93.034C83.965 93.003 84.006 92.983 84.047 92.962C86.515 91.553 90.072 90.659 94.041 90.649H94.123V90.65Z" fill="#543E36"/>--}}
{{--                        <path d="M135.947 71.764L135.937 84.05C135.937 87.135 135.649 90.157 135.115 93.088C134.898 94.26 134.652 95.421 134.364 96.573L124.874 110.278L94.092 116.375H94.082L94.071 116.385V116.375L94.041 90.648H94.123C98.092 90.658 101.659 91.553 104.127 92.961C104.168 92.982 104.198 93.002 104.24 93.033C104.384 93.126 104.538 93.218 104.692 93.311C104.702 93.321 104.722 93.332 104.743 93.342C107.684 95.049 112.331 99.267 117.575 99.267C118.963 99.267 120.309 99.185 121.594 99.041C121.81 99.02 122.016 99 122.232 98.969C125.543 98.352 129.162 94.548 131.845 88.945V88.935C132.872 86.817 133.757 84.442 134.466 81.872C135.392 78.479 135.875 75.169 135.937 72.156C135.947 72.021 135.947 71.897 135.947 71.764Z" fill="#543E36"/>--}}
{{--                        <path d="M94.074 107.125C99.7377 107.125 104.329 105.706 104.329 103.955C104.329 102.204 99.7377 100.785 94.074 100.785C88.4103 100.785 83.819 102.204 83.819 103.955C83.819 105.706 88.4103 107.125 94.074 107.125Z" fill="#ECC19C"/>--}}
{{--                        <path d="M64.131 155.174V211.732H59.762V158.362C60.348 157.889 60.934 157.426 61.531 156.984C62.384 156.347 63.247 155.75 64.131 155.174Z" fill="#435363"/>--}}
{{--                        <path d="M124.021 155.185V200.741V211.732H128.39V200.741V158.372L124.021 155.185Z" fill="#435363"/>--}}
{{--                        <path d="M82.113 151.713L94.074 166.049L106.036 151.713H82.113Z" fill="#1A202C"/>--}}
{{--                        <path d="M94.074 225.437H87.001L92.111 159.637C92.326 160.474 95.823 160.474 96.038 159.637L101.148 225.437H94.074Z" fill="#1A202C"/>--}}
{{--                        <path d="M94.07 151.638L94.04 151.689L94.029 151.71L89.063 160.048L84.426 167.82L71.872 150.373C72.273 150.085 72.674 149.777 73.055 149.458C73.065 149.468 73.065 149.468 73.076 149.479C75.594 147.474 77.836 145.12 79.697 142.488L94.04 151.618L94.07 151.638Z" fill="#E7ECF2"/>--}}
{{--                        <path d="M116.278 150.373L103.724 167.82L99.087 160.048L94.11 151.71L94.069 151.638L108.505 142.447C110.376 145.099 112.607 147.464 115.136 149.489C115.518 149.797 115.897 150.096 116.278 150.373Z" fill="#E7ECF2"/>--}}
{{--                    </g>--}}
{{--                    <defs>--}}
{{--                        <clipPath id="clip0">--}}
{{--                            <rect width="188.148" height="188.148" fill="white"/>--}}
{{--                        </clipPath>--}}
{{--                    </defs>--}}
{{--                </svg>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    </body>--}}
{{--</html>--}}


