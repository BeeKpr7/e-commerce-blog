@if (session('success'))
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 4000)"
        class="fixed top-3 inset-x-0 mx-auto w-64 text-center bg-green-500 text-white py-2 px-4 rounded-xl text-sm">
        {{ session('success') }}
    </div>
@endif
