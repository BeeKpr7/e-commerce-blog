<x-layout>

    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 space-y-6 lg:mt-20">

        @if ($posts->count())
            <x-post.grid :posts="$posts" />

            {{ $posts->links() }}
        @else
            <p class="text-center">{{ __('post.infos.no-posts') }}</p>
        @endif

    </main>
</x-layout>
