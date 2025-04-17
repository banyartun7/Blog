@props(['name', 'value' => ''])
<x-form.form-wrapper>
    <x-form.label name="{{ $name }}" />
    <textarea name="{{ $name }}" rows="7" id="enterBody" class="form-control placeholder="Enter blog
        {{ $name }}...">{{ old($name, $value) }}</textarea>
    <x-error name="{{ $name }}" />
</x-form.form-wrapper>
