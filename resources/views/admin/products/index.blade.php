<x-layout>
    <x-setting title="{{ __('product.title.manage') }}">

        <div class="pb-2">
            <a class="px-4 py-3 font-semibold text-white bg-blue-500 rounded-lg shadow-md hover:bg-blue-800"
                href="{{ route('products.create') }}">{{ __('product.title.create') }}</a>

        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                <tbody>
                    @foreach ($products as $product)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{ route('products.show', $product) }}">
                                    {{ $product->name }}
                                </a>
                            </th>
                            <td class="px-6 py-4">
                                {{ $product->price }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('products.edit', $product) }}"
                                    class="font-medium text-blue-500 dark:text-blue-700 hover:underline">{{ __('form.button.edit') }}</a>
                            </td>
                            <td class="py-4 pl-0 pr-3">

                                <form method="POST" action="{{ route('products.destroy', $product) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        class="font-medium text-red-500 dark:text-blue-700 hover:underline">{{ __('form.button.edit') }}</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $products->links() }}
    </x-setting>
</x-layout>
