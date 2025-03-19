@props(['action', 'method' => 'POST'])

<form action="{{ $action }}" method="POST" class="max-w-lg mx-auto p-6 bg-white shadow-lg rounded-lg mt-6">
    @csrf
    @if($method !== 'POST')
        @method($method)
    @endif
    {{ $slot }}
</form>
