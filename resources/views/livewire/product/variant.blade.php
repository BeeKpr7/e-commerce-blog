<x-panel>
    <h1 class="text-lg font-semibold text-center mb-7">{{ __('product.infos.add-variant') . ' ' . $product->name }}</h1>
    <div class="flex justify-center space-x-3 items-top">
        <x-form.input name="price" type="number" wire:model.blur="price" />
        <x-form.input type="number" name="stock" wire:model.blur="stock" />
        <x-form.input type="number" name="weight" wire:model.blur="weight" />
    </div>



    <div class="flex justify-end">
        <button wire:click="save"
            class="p-3 font-medium rounded bg-amber-400 bg-opacity-70">{{ __('product.title.create') }}</button>
    </div>
</x-panel>
