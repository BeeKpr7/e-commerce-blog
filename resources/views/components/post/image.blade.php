<div>
    <img @if (app()->environment('production')) src="{{ asset('storage/' . $post->image) }}" 
                @else
                    src="{{ $post->image }}" @endif
        alt="Blog Post illustration" class="w-full rounded-xl">
</div>
