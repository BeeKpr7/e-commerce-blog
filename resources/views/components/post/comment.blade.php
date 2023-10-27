@props(['comments', 'post'])
<section class="py-8 bg-white dark:bg-gray-900 lg:py-16">
    <div class="max-w-2xl px-4 mx-auto">
        <h2 class="mb-8 text-2xl font-bold text-center lg:text-3xl">{{ __('post.comment.title') }}</h2>
        @include('posts._add-comment-form')
        @foreach ($comments as $comment)
            <article class="p-6 mb-6 text-base bg-white rounded-lg dark:bg-gray-900">
                <footer class="flex items-center justify-between mb-2">
                    <div class="flex items-center">
                        <p class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white"><img
                                class="w-6 h-6 mr-2 rounded-full"
                                src="https://i.pravatar.cc/150?u={{ $comment->author->id }}"
                                alt="Michael Gough">{{ $comment->author->username }}</p>
                        <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08"
                                title="February 8th, 2022">{{ $comment->created_at->diffForhumans() }}</time>
                        </p>
                    </div>
                </footer>
                <p class="text-gray-500 dark:text-gray-400">{{ $comment->body }}</p>
            </article>
        @endforeach
    </div>
</section>
