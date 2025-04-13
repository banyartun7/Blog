<x-layout>
    <x-slot name="title">
        <title>Creative Coder</title>
    </x-slot>

    @if (session('status'))
    <div class="alert alert-success text-center">
        {{ session("status") }}
    </div>
    @endif
    <x-hero_session />
    <x-blogs-section :blogs="$blogs" />
</x-layout>
