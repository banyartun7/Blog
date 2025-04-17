<x-admin-layout>

    @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif
    <h3 class="my-4 text-center">Blog Create Form</h3>
    <x-card-wrapper>
        <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
            @csrf
            <x-form.form-input name="title" />
            <x-form.form-input name="slug" />
            <x-form.form-wrapper>
                <x-form.label name="category" />
                <select class="form-control" name="category_id">
                    <option value="">Category</option>
                    @foreach ($categories as $category)
                        <option {{ $category->id == old('category_id') ? 'selected' : '' }} value="{{ $category->id }}">
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                <x-error name="category_id" />
            </x-form.form-wrapper>
            <x-form.form-input name="intro" />
            <x-form.textarea name="body" />
            <x-form.form-input name="thumbnail" type="file" />
            <button type="submit" class="btn btn-primary">
                Create
            </button>
        </form>
    </x-card-wrapper>
</x-admin-layout>
