<x-layout>
    <main class="max-w-6xl mx-auto mt-6 space-y-6 lg:mt-20">
        @if ($products->count())
            <x-product.grid :products="$products" />

            {{ $products->links() }}
        @else
            <p class="text-center">{{ __('product.infos.no-products') }}</p>
        @endif
    </main>
</x-layout>
