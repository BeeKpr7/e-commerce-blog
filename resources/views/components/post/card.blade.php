@props(['post'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>

    <div class="flex flex-col h-full px-5 py-6">
        <div>
            <x-post.image :post="$post" />
        </div>

        <div class="flex flex-col justify-between h-full mt-8 ">
            <header>
                <div class="space-x-2">
                    <div class="space-x-2">
                        <x-category-button :category="$post->category" />
                    </div>
                </div>

                <div class="mt-4">
                    <a href="/posts/{{ $post->slug }}">
                        <h1 class="text-3xl">
                            {{ $post->title }}
                        </h1>
                    </a>

                    <span class="block mt-2 text-xs text-gray-400">
                        Published <time>{{ $post->created_at->diffForhumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="mt-4 space-y-4 text-sm grow">
                {!! $post->excerpt !!}
            </div>

            <footer class="flex items-center justify-between mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <a href="/?author={{ $post->author->username }}">
                            <h5 class="w-32 font-bold">{{ $post->author->name }}</h5>
                        </a>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{ $post->slug }}"
                        class="px-8 py-2 text-xs font-semibold transition-colors duration-300 bg-gray-200 rounded-full hover:bg-gray-300">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>

</article>
