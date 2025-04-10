<x-layout>
    <x-slot name="title">
        <title>Creative Coder</title>
    </x-slot>
    <x-hero_session />
    <x-blogs-section :blogs="$blogs" :categories="$categories" :currentCategory="$currentCategory ?? null" />
    <x-subscribe />
</x-layout>
