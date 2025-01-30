<div class="bg-white shadow-lg rounded-xl p-4 border border-gray-200">
    @if(isset($title))
        <h2 class="text-xl font-semibold text-gray-700 mb-2">{{ $title }}</h2>
    @endif
    <div class="text-gray-600">
        {{ $slot }}
    </div>
</div>
