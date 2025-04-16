@props(['name', 'type' => 'text'])
<x-form.form-wrapper>
    <x-form.label name="{{ $name }}" />
    <input name="{{ $name }}" value="{{ old($name) }}" type="{{ $type }}" class="form-control"
        id="{{ $name }}" placeholder="Enter blog {{ $name }}" />
    <x-error name="{{ $name }}" />
</x-form.form-wrapper>
