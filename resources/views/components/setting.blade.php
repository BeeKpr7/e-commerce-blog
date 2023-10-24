@props(['title'])

<section class="max-w-6xl py-8 px-12 mx-auto">
    <h1
        class="text-xl border-b-2 pb-4 mb-8 border-gray-200 font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
        {{ $title }}
    </h1>
    <div class="flex   mx-auto">
        <aside class="w-48 flex-shrink-0">
            <h3 class="font-bold text-lg mb-4">Links</h3>
            <ul class="">
                <li>
                    <a href="{{ route('posts.index') }}"
                        class=" text-md mb-4 block {{ Request::routeIs('posts.index') ? 'text-blue-500' : '' }} ">All
                        Posts</a>
                </li>
                <li>
                    <a href="{{ route('posts.create') }}"
                        class=" text-md mb-4 block {{ Request::routeIs('posts.create') ? 'text-blue-500' : '' }} ">New
                        Post</a>
                </li>
            </ul>
        </aside>
        <main class="w-full flex-0">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
