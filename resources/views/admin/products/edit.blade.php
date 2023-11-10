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

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead>
                        <a x-data="" x-on:click.prevent="$dispatch('open-modal', 'add-variant-form')"
                            class="px-4 py-3 font-semibold text-white bg-teal-600 rounded-lg shadow-md cursor-pointer hover:bg-opacity-90 hover:shadow-lg">{{ __('product.infos.add-variant') . ' ' . $product->name }}</a>

                    </thead>

                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                            <td scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{ route('products.show', $product) }}">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <x-badge :color="$product->status->color()">
                                    {{ $product->status->label() }}
                                </x-badge>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{ route('products.edit', $product) }}"
                                    class="font-medium text-blue-500 dark:text-blue-700 hover:underline">{{ __('form.button.edit') }}</a>
                            </td>

                        </tr>

                    </tbody>
                </table>


                <div class="flex justify-center">
                    <x-form.button>Update a Product</x-form.button>
                </div>
            </div>
        </form>
        <x-modal name="add-variant-form" :show="$errors->variantForm->isNotEmpty()" focusable>
            @livewire('counter')
        </x-modal>

    </x-setting>
</x-layout>
