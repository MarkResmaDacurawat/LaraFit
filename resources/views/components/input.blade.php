@props(['label', 'type' => 'text', 'name', 'value' => '', 'required' => false, 'min' => null, 'max' => null])

<div class="flex flex-col">
    <label for="{{ $name }}" class="text-gray-800 font-medium">{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" value="{{ $value }}" 
           class="border border-gray-300 rounded-md p-2 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 shadow-sm"
           @if($required) required @endif @if($min) min="{{ $min }}" @endif @if($max) max="{{ $max }}" @endif>
</div>
