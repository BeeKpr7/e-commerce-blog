<x-layout>
    <x-setting title="{{ __('category.infos.create') }}">
        <!-- Don't forget multipart/form-data for input files !!! -->
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="space-y-4 md:space-y-6">

                <x-form.input name="name" />

                <div class="flex justify-center">
                    <x-form.button>{{ __('category.title.create') }}</x-form.button>
                </div>
            </div>
        </form>
    </x-setting>
</x-layout>
