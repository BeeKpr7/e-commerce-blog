<x-layout>
    <x-setting :title="__('category.title.edit') . ': ' . $category->name">
        <!-- Don't forget multipart/form-data for input files !!! -->
        <form class="space-y-4" action="{{ route('categories.update', $category) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="name" :value="old('name', $category->name)" />

            <div class="flex justify-center">
                <x-form.button>{{ __('category.title.edit') }}</x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>
