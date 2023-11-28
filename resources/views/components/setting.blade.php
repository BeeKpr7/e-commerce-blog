@props(['title'])

<section class="max-w-6xl px-12 py-8 mx-auto">
    <h1
        class="pb-4 mb-8 text-xl font-bold leading-tight tracking-tight text-gray-900 border-b-2 border-gray-200 md:text-2xl dark:text-white">
        {{ $title }}
    </h1>
    <div class="flex mx-auto">
        <aside class="flex-shrink-0 w-48">
            <ul class="">
                <li>
                    <a href="{{ route('posts.index') }}"
                        class="flex text-md mb-4 space-x-3 {{ Request::routeIs('posts.index') ? 'text-amber-500' : '' }} "><svg
                            aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" width="20"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p>{{ __('post.infos.post') }}</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products.index') }}"
                        class=" text-md mb-4 flex space-x-3 {{ Request::routeIs('products.index') ? 'text-amber-500' : '' }} "><svg
                            aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" width="20"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p>{{ __('product.infos.product') }}</p>
                    </a>
                </li>
                <li>
                    <a href="{{ route('categories.index') }}"
                        class=" text-md mb-4 flex space-x-3 {{ Request::routeIs('categories.index') ? 'text-amber-500' : '' }} "><svg
                            aria-hidden="true" fill="none" stroke="currentColor" stroke-width="1.5" width="20"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                        <p>{{ __('category.infos.category') }}</p>
                    </a>
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
