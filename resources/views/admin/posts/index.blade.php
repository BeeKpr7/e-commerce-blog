<x-layout>
    <x-setting title="{{ __('post.title.manage') }}">

        <div class="pb-2">
            <a class="px-4 py-3 font-semibold text-white bg-teal-600 rounded-lg shadow-md hover:bg-teal-800"
                href="{{ route('posts.create') }}">{{ __('post.title.create') }}</a>
        </div>

        <div class="relative overflow-x-auto shadow-lg sm:rounded-lg">

            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <tbody>
                    @foreach ($posts as $post)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{ route('posts.show', $post) }}">
                                    {{ $post->title }}
                                </a>
                            </th>
                            <td class="px-6 py-4">
                                {{ $post->author->name }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('posts.edit', $post) }}"
                                    class="font-medium text-blue-500 dark:text-blue-700 hover:underline">{{ __('form.button.edit') }}</a>
                            </td>
                            <td class="py-4 pl-0 pr-3">

                                <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="font-medium text-red-500 dark:text-blue-700 hover:underline">{{ __('form.button.delete') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $posts->links() }}
    </x-setting>
</x-layout>
