<div
    {{ $attributes->merge(['class' => 'w-full mx-auto  bg-gray-100 border border-gray-300 rounded-lg shadow dark:border xl:p-0 dark:bg-gray-800 dark:border-gray-700']) }}>

    <div class="px-6 py-6 space-y-4 md:space-y-2 sm:px-8">

        {{ $slot }}
    </div>
</div>
