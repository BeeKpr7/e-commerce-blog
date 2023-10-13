@props(['comments', 'post'])
<section class="bg-white dark:bg-gray-900 py-8 lg:py-16">
    <div class="max-w-2xl mx-auto px-4">
        <h2 class="text-2xl lg:text-3xl font-bold text-center mb-8">Comments</h2>
        @include('posts._add-comment-form')
        @foreach ($comments as $comment)
            <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                <footer class="flex justify-between items-center mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                class="mr-2 w-6 h-6 rounded-full"
                                src="https://i.pravatar.cc/150?u={{ $comment->author->id }}"
                                alt="Michael Gough">{{ $comment->author->username }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                title="February 8th, 2022">{{ $comment->created_at->format('l jS \o\f F Y h:i:s A') }}</time>
                        </p>
                    </div>
                </footer>
                <p class="text-gray-500 dark:text-gray-400">{{ $comment->body }}</p>
            </article>
        @endforeach
    </div>
</section>
