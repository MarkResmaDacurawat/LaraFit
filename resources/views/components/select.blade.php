@props(['label', 'name'])

<div class="flex flex-col">
    <label for="{{ $name }}" class="text-gray-800 font-medium">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm">
        {{ $slot }}
    </select>
</div>
