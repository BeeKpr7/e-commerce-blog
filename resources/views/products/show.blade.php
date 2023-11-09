<x-layout>
    <main class="max-w-6xl mx-auto mt-10 space-y-6 lg:mt-20">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 mb-10 lg:text-center lg:pt-14">
                <img src="{{ asset('storage/' . $product->image) }}" alt="" class="rounded-xl">

                <p class="block mt-4 text-xs text-gray-400">
                    {{ __('post.infos.published') }} <time>{{ $product->created_at->diffForHumans() }}</time>
                </p>
            </div>
            <div class="col-span-8">
                <div class="justify-between hidden mb-6 lg:flex">
                    <a href="{{ route('products.all') }}"
                        class="relative inline-flex items-center text-lg transition-colors duration-300 hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                    d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>
                        {{ __('product.infos.back-to-products') }}
                    </a>

                    <div class="space-x-2">
                        <x-category-button :category="$product->category" />
                    </div>
                </div>

                <h1 class="mb-10 text-3xl font-bold lg:text-4xl">
                    {{ $product->name }}
                </h1>

                <div class="mb-10 space-y-4 leading-loose lg:text-lg">
                    {!! $product->description !!}
                </div>
                <a href="#"
                    class="block w-full p-2 font-semibold text-center text-black bg-gradient-to-r hover:bg-opacity-40 to-orange-400 from-amber-400 rounded-xl">{{ __('product.infos.add-to-cart') }}</a>

            </div>

        </article>
    </main>
</x-layout>
