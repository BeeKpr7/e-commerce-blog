<div>
    <img @if (!str_contains($product->image, 'http')) src="{{ asset('storage/' . $product->image) }}" 
                @else
                    src="{{ $product->image }}" @endif
        alt="Blog Product illustration" class="w-full rounded-xl">
</div>
