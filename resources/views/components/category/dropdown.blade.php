<x-dropdown>
    <x-slot name='trigger'>
        <button
            class="lg:inline-flex flex appearance-none bg-transparent py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left">
            {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}
            <x-icon name="down-arrow" class=" absolute pointer-events-none" />
        </button>
    </x-slot>

    @if (isset($currentCategory))
        <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}">
            All
        </x-dropdown-item>
    @endif


    @foreach ($categories as $category)
        <x-dropdown-item
            href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            :active="isset($currentCategory) && $currentCategory->is($category)">
            {{ $category->name }}
        </x-dropdown-item>
    @endforeach

</x-dropdown>
