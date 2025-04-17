@props(['name', 'type' => 'text', 'value' => ''])
<x-form.form-wrapper>
    <x-form.label name="{{ $name }}" />
    <input name="{{ $name }}" value="{{ old($name, $value) }}" type="{{ $type }}" class="form-control"
        id="{{ $name }}" placeholder="Enter blog {{ $name }}" />
    <x-error name="{{ $name }}" />
</x-form.form-wrapper>
