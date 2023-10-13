<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<body style="font-family: Open Sans, sans-serif;">
    <section class="px-6 py-8">
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="{{ url('/') }}/images/serpolet.svg" alt="Laracasts Logo" width="250"
                        height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <div class="flex items-center space-x-4">
                                <div class="font-medium dark:text-white">
                                    <div>Welcome {{ auth()->user()->name }}</div>
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
                        class="px-5 py-3 ml-3 text-xs font-semibold text-white uppercase bg-gray-500 rounded-full">Register</a>
                    <a href="/login"
                        class="px-5 py-3 ml-3 text-xs font-semibold text-white uppercase bg-gray-500 rounded-full">Log
                        In</a>
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
                                class="py-2 pl-4 lg:bg-transparent lg:py-0 focus-within:outline-none" required>
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
