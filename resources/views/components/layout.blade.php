<!doctype html>

<head>
    <title>Laravel From Scratch Blog</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="{{ url('/') }}">
                    <img src="{{ url('/') }}/images/serpolet.svg" alt="Laracasts Logo" width="250" height="16">
                </a>
            </div>
            {{-- Language Dropdown --}}
            <x-dropdown>
                    <x-slot name="trigger">
                        <div class="flex items-center w-14 space-x-4">
                            <div class="font-medium dark:text-white">
                                <div>{{app()->getLocale()}}</div>
                            </div>
                        </div>
                    </x-slot>

                    @foreach(config('localization.locales') as $locale)
                        <x-dropdown-item href="{{ route('localization',['locale' => $locale]) }}" :active="$locale == app()->getLocale()">{{$locale}}</x-dropdown-item>
                    @endforeach
            </x-dropdown>

            <div class="mt-8 md:mt-0">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <div class="flex items-center space-x-4">
                                <div class="font-medium dark:text-white">
                                    <div>{{__('Welcome')}} {{ auth()->user()->name }}</div>
                                </div>
                                <img class="w-10 h-10 rounded-full" src="https://i.pravatar.cc/150?u={{ auth()->id() }}"
                                    alt="">
                            </div>
                        </x-slot>
                        @admin
                            <x-dropdown-item href="{{ route('posts.index') }}" :active="Request::routeIs('posts.index')">Dashboard</x-dropdown-item>
                            <x-dropdown-item href="{{ route('posts.create') }}" :active="request()->is('admin/posts/create')">New post</x-dropdown-item>
                        @endadmin
                        <x-dropdown-item class="hover:bg-gray-700">
                            <form id="logoutForm" method="POST" action="/logout" class="inline">
                                @csrf
                                <button type="submit" class="font-semibold text-black ">Log
                                    Out</button>
                            </form>
                        </x-dropdown-item>
                        {{-- <x-dropdown-item class="font-semibold" href="#" x-data="{}"
                            @click.prevent="document.querySelector('#logoutForm').submit()">2nd Logout</x-dropdown-item> --}}

                    </x-dropdown>
                @else
                    <a href="/register"
                        class="px-5 py-3 ml-3 text-xs font-semibold text-white uppercase bg-gray-500 rounded-full">{{__('Register')}}</a>
                    <a href="/login"
                        class="px-5 py-3 ml-3 text-xs font-semibold text-white uppercase bg-gray-500 rounded-full">{{__('Log in')}}</a>
                    <a href="#subscribe"
                        class="px-5 py-3 ml-3 text-xs font-semibold text-white uppercase bg-blue-500 rounded-full">
                        Subscribe for Updates
                    </a>

                @endauth


            </div>
        </nav>
        {{ $slot }}

        <footer class="px-10 py-16 mt-16 text-center bg-gray-100 border border-black border-opacity-5 rounded-xl">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="mt-3 text-sm">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto rounded-full lg:bg-gray-200">

                    <form id="subscribe" method="POST" action="newsletter" class="text-sm lg:flex">
                        @csrf
                        <div class="flex items-center lg:py-3 lg:px-5 ">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>

                            <input id="email" name="email" type="email" placeholder="Your email address"
                                class="py-2 pl-4 border-0 lg:bg-transparent lg:py-0 focus:ring-0" required>
                            @error('email')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <button type="submit"
                            class="px-8 py-3 mt-4 text-xs font-semibold text-white uppercase transition-colors duration-300 bg-blue-500 rounded-full hover:bg-blue-600 lg:mt-0 lg:ml-3">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
        <x-flash />
    </section>
</body>
