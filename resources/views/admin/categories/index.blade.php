<x-layout>
    <x-setting title="{{ __('category.title.manage') }}">

        <div class="pb-2">
            <a class="px-4 py-3 font-semibold text-white rounded-lg shadow-md bg-amber-500 hover:bg-opacity-70 hover:shadow-lg"
                href="{{ route('categories.create') }}">{{ __('category.title.create') }}</a>

        </div>

        <div class="relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <tbody>
                    @foreach ($categories as $category)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="#">
                                    {{ ucwords($category->name) }}
                                </a>
                            </th>

                            <td @click.away="open = false" class="relative" x-data="{ open: false }">
                                <button @click="open = !open"
                                    class="px-6 py-4 font-medium text-amber-500 dark:text-blue-700 hover:underline focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
                                    </svg>

                                </button>
                                <ul class="absolute top-0 z-50 p-4 mt-12 space-y-3 font-medium text-gray-500 -translate-x-1/2 bg-gray-100 rounded-lg shadow-lg text-md dark:text-gray-400 dark:bg-gray-700"
                                    x-show="open">
                                    <li class="">
                                        <a href="{{ route('categories.edit', $category) }}"
                                            class="font-medium text-blue-500 dark:text-blue-700 hover:underline">{{ __('form.button.edit') }}</a>
                                    </li>
                                    <li class="">

                                        <form method="POST" action="{{ route('categories.destroy', $category) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                class="font-medium text-red-500 dark:text-blue-700 hover:underline">{{ __('form.button.delete') }}</button>
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $categories->links() }}
    </x-setting>
</x-layout>
