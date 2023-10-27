<x-dropdown>
    <x-slot name='trigger'>
        <button
            class="flex w-full py-2 pl-3 text-sm font-semibold text-left bg-transparent appearance-none lg:inline-flex pr-9 lg:w-32">
            {{ isset($currentCategory) ? $currentCategory->name : __('post.button.category') }}
            <x-icon name="down-arrow" class="absolute pointer-events-none " />
        </button>
    </x-slot>

    @if (isset($currentCategory))
        <x-dropdown-item href="/{{ http_build_query(request()->except('category', 'page')) }}">
            {{ __('post.button.all') }}
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
