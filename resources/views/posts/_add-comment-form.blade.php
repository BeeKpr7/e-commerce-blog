@auth
    <div class="flex items-center mb-6">
        <img class="w-12 h-12 mr-2 rounded-full" src="https://i.pravatar.cc/150?u={{ auth()->id() }}" alt="Michael Gough">
        <h3 class="text-lg font-bold text-gray-900 lg:text-2xl dark:text-white">Leave a comment </h3>
    </div>
    <form class="mb-6" method="post" action="/posts/{{ $post->slug }}/comments">
        @csrf
        <div
            class="px-4 py-2 mb-4 bg-white border border-gray-200 rounded-lg rounded-t-lg dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">Your comment</label>
            <textarea id="comment" rows="6" name="body"
                class="w-full px-0 text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                placeholder="Write a comment..." required minlength="5" value="{{ old('comment') }}"></textarea>
        </div>
        @error('body')
            <p class="mt-4 text-xs italic text-red-500">
                {{ $message }}
            </p>
        @enderror
        <div class="flex justify-end">
            <button type="submit"
                class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-500 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Post comment
            </button>
        </div>
    </form>
@else
    <p class="text-right">
        <a href="/login" class="text-blue-500 hover:underline">{{ __('Log in') }}</a> {{ __('or') }}
        <a href="/register" class="text-blue-500 hover:underline">{{ __('Register') }}</a>
        {{ __('post.comment.to-leave') }}.
    </p>
@endauth
