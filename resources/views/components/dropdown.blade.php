<div x-data="{ show: false }" @click.away="show=false" class="relative cursor-pointer">
    {{-- Trigger --}}
    <div @click="show = !show">
        {{ $trigger }}
    </div>
    {{-- Links --}}
    <div x-show="show" class="absolute z-50 w-full py-1 mt-2 overflow-auto bg-gray-100 rounded-xl max-h-52">
        {{ $slot }}
    </div>
</div>
