<x-layout>
    <x-setting :title="__('product.title.edit') . ' : ' . $product->name">
        <!-- Don't forget multipart/form-data for input files !!! -->
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="space-y-4 md:space-y-6">
                <div class="flex justify-between">
                    <div class="w-1/2">
                        <x-form.input name="name" :value="old('title', $product->name)" />
                    </div>
                    <div class="w-2/5">
                        <x-form.field name="status">
                            <select name="status" id="status"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                {{-- <option value="">Select a category</option> --}}
                                @foreach (\App\Enums\ProductStatus::cases() as $status)
                                    <option value="{{ $status->value }}"
                                        {{ $product->status->value == $status->value ? 'selected' : '' }}>
                                        {{ $status->label() }}
                                    </option>
                                @endforeach
                            </select>
                        </x-form.field>
                    </div>
                </div>

                <div class="flex justify-between">
                    <div class="w-1/2">
                        <x-form.input name="place" :value="old('place', $product->place)" />
                    </div>
                    <div class="w-2/5">
                        <x-form.field name="category">
                            <select name="category_id" id="category_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">Select a category</option>
                                @foreach (\App\Models\Category::all() as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category->id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </x-form.field>
                    </div>
                </div>

                <x-form.textarea name="description">{{ old('description', $product->description) }}</x-form.textarea>

                <div class="flex items-center">
                    <div class="flex-1">
                        <x-form.input name="image" type="file" :value="old('image', $product->image)" />
                    </div>
                    <img @if (!str_contains($product->image, 'http')) src="{{ asset('storage/' . $product->image) }}" 
                @else
                    src="{{ $product->image }}" @endif
                        alt="{{ $product->name }}" class="w-32 h-32 m-4 rounded">
                </div>



                <div class="flex justify-center">
                    <x-form.button>Update a Product</x-form.button>
                </div>
            </div>
        </form>

        <div class="flex flex-col items-center space-y-4">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <tbody>
                    @foreach ($product->skus as $variant)
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $variant->name }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $variant->weight }} g
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $variant->stock }} Units
                            </td>
                            <td class="px-6 py-4 text-right">
                                {{ $variant->price }} euros
                            </td>
                            <td @click.away="open = false" class="relative" x-data="{ open: false }">
                                <button type="button" @click="open = !open"
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
                                        <a href="{{ route('products.edit', $product) }}"
                                            class="font-medium text-blue-500 dark:text-blue-700 hover:underline">{{ __('form.button.edit') }}</a>
                                    </li>
                                    <li class="">

                                        <form method="POST" action="{{ route('products.destroy', $product) }}">
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
            <a x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-variant-form')"
                class="flex-none px-4 py-3 mt-10 font-semibold text-white bg-teal-600 rounded-lg shadow-md cursor-pointer grow-0 hover:bg-opacity-90 hover:shadow-lg"><svg
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </a>
        </div>

        <x-modal name="add-variant-form" :show="$errors->variantForm->isNotEmpty()" focusable>

            {{-- @livewire('product.variant', ['product' => $product]) --}}
            <livewire:product.variant :$product />
        </x-modal>

    </x-setting>
</x-layout>
