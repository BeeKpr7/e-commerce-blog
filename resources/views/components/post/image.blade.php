<div>
    <img @if (!str_contains($post->image, 'http')) src="{{ asset('storage/' . $post->image) }}" 
                @else
                    src="{{ $post->image }}" @endif
        alt="Blog Post illustration" class="w-full rounded-xl">
</div>
