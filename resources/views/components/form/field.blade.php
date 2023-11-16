@props(['name'])
<div>
    <x-form.label name="{{ $name }}" />
    {{ $slot }}
    <x-form.error name="{{ $name }}" />
</div>
