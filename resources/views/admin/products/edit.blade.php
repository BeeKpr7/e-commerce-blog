<x-layout>
    <x-setting :title="'Edit product : ' . $product->name">
        <!-- Don't forget multipart/form-data for input files !!! -->
        <form class="space-y-4" action="{{ route('products.update', $product) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('title', $product->name)" />
            <x-form.input name="price" type="number" :value="old('price', $product->price)" />
            <x-form.textarea name="description">{{ old('description', $product->description) }}</x-form.textarea>

            <div class="flex items-center">
                <div class="flex-1">
                    <x-form.input name="image" type="file" :value="old('image', $product->image)" />
                </div>
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-32 h-32 m-4 rounded">
            </div>
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
            <div class="flex justify-center">
                <x-form.button>Update a Product</x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>
