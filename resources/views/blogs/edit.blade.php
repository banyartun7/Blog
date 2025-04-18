<x-admin-layout>

    @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif
    <h3 class="my-4 text-center">Blog Edit Form</h3>
    <x-card-wrapper>
        <form method="POST" action="{{ route('blogs.update', $blog->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form.form-input name="title" :value="$blog->title" />
            <x-form.form-input name="slug" :value="$blog->slug" />
            <x-form.form-wrapper>
                <x-form.label name="category" />
                <select class="form-control" name="category_id">
                    <option value="">Category</option>
                    @foreach ($categories as $category)
                        <option {{ $category->id == old('category_id', $blog->category->id) ? 'selected' : '' }}
                            value="{{ $category->id }}">
                            {{ $category->name }}</option>
                    @endforeach
                </select>
                <x-error name="category_id" />
            </x-form.form-wrapper>
            <x-form.form-input name="intro" :value="$blog->intro" />
            <x-form.textarea name="body" :value="$blog->body" />
            <x-form.form-input name="thumbnail" type="file" />
            <img width="110" class="d-block img-fluid mb-3" height="80"
                src="{{ asset('storage/' . $blog->thumbnail) }}" />
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </form>
    </x-card-wrapper>
</x-admin-layout>
