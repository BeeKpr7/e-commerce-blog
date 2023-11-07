<x-layout>
    <x-setting title="{{ __('Create new product') }}">
        <!-- Don't forget multipart/form-data for input files !!! -->
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="space-y-4 md:space-y-6">

                <x-form.input name="name" />
                <x-form.input name="price" type="number" />
                <x-form.textarea name="description" />
                <x-form.input name="image" type="file" />

                <x-form.field name="category_id">
                    <select name="category_id" id="category_id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="">Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </x-form.field>
                <div class="flex justify-center">
                    <x-form.button>{{ __('product.title.create') }}</x-form.button>
                </div>
            </div>
        </form>
    </x-setting>
</x-layout>
