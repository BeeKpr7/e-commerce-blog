<!doctype html>

<head>
    <title>Miellerie Serpolet</title>

    @vite('resources/js/app.js')
    @livewireStyles
</head>

<body class="bg-amber-600 bg-opacity-5">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="{{ url('/') }}">
                    <h1 class="font-serif text-xl font-medium">MIELLERIE - <span
                            class="text-amber-400 text-opacity-70">Serpolet</span>
                    </h1>
                </a>
            </div>

            <div class="space-x-5">
                <a href="{{ route('laruche') }}">Blog</a>
                <a href="{{ route('lamiellerie') }}">Produits</a>
            </div>
            <div class="flex items-center mt-8 space-x-5 md:mt-0">

                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <div class="flex items-center space-x-4">
                                <div class="font-medium dark:text-white">
                                    <div>{{ __('Welcome') }} {{ auth()->user()->name }}</div>
                                </div>
                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150?u={{ auth()->id() }}"
                                    alt="">
                            </div>
                        </x-slot>
                        @admin
                            <x-dropdown-item href="{{ route('posts.index') }}"
                                :active="Request::routeIs('posts.index')">{{ __('Dashboard') }}</x-dropdown-item>
                            <x-dropdown-item href="{{ route('posts.create') }}"
                                :active="request()->is('admin/posts/create')">{{ __('post.infos.new') }}</x-dropdown-item>
                        @endadmin

                        <x-dropdown-item class="hover:bg-gray-700">
                            <form id="logoutForm" method="POST" action="/logout" class="inline">
                                @csrf
                                <button type="submit" class="font-semibold text-black ">{{ __('Log Out') }}</button>
                            </form>
                        </x-dropdown-item>
                        {{-- <x-dropdown-item class="font-semibold" href="#" x-data="{}"
                            @click.prevent="document.querySelector('#logoutForm').submit()">2nd Logout</x-dropdown-item> --}}

                    </x-dropdown>
                @else
                    <a href="/register"
                        class="px-5 py-3 ml-3 text-xs font-semibold text-white uppercase bg-gray-500 rounded-full">{{ __('Register') }}</a>
                    <a href="/login"
                        class="px-5 py-3 ml-3 text-xs font-semibold text-white uppercase bg-gray-500 rounded-full">{{ __('Log in') }}</a>
                    <a href="#subscribe"
                        class="px-5 py-3 ml-3 text-xs font-semibold text-white uppercase bg-blue-500 rounded-full">
                        {{ __('Subscribe for Updates') }}
                    </a>

                @endauth
                {{-- Language Dropdown --}}
                <x-dropdown>
                    <x-slot name="trigger">
                        <div class="flex items-center space-x-4 w-14">
                            <div class="font-medium uppercase dark:text-white">
                                <div>{{ app()->getLocale() }}</div>
                            </div>
                        </div>
                    </x-slot>

                    @foreach (config('localization.locales') as $locale)
                        <x-dropdown-item href="{{ route('localization', ['locale' => $locale]) }}"
                            :active="$locale == app()->getLocale()">{{ $locale }}</x-dropdown-item>
                    @endforeach
                </x-dropdown>

            </div>
        </nav>
        {{ $slot }}


        <x-flash />
    </section>
    @livewireScripts
</body>
