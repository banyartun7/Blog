<x-layout>
    <x-slot name="title">
        <title>Blog Create Form</title>
    </x-slot>
    @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif
    <h3 class="my-5 text-center">Blog Create Form</h3>
    <div class="col-md-8 mx-auto">
        <x-card-wrapper>
            <form method="POST" action="{{ route('blogs.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-4">
                    <label for="titleInput" class="mb-3">Title</label>
                    <input name="title" value="{{ old('title') }}" type="text" class="form-control"
                        id="titleInput" placeholder="Enter blog title" />
                    <x-error name="title" />
                </div>
                <div class="form-group mb-4">
                    <label for="slugInput" class="mb-3">Slug</label>
                    <input name="slug" value="{{ old('slug') }}" type="text" class="form-control" id="slugInput"
                        placeholder="Enter blog slug" />
                    <x-error name="slug" />
                </div>
                <div class="form-group mb-4">
                    <select class="form-control" name="category_id">
                        <option value="">Category</option>
                        @foreach ($categories as $category)
                            <option {{ $category->id == old('category_id') ? 'selected' : '' }}
                                value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-error name="category_id" />
                </div>
                <div class="form-group mb-4">
                    <label for="enterIntro" class="mb-3">Intro</label>
                    <input name="intro" value="{{ old('intro') }}" type="text" class="form-control"
                        id="enterIntro" placeholder="Enter blog intro" />
                    <x-error name="intro" />
                </div>
                <div class="form-group mb-4">
                    <label for="enterBody" class="mb-3">Body</label>
                    <textarea name="body" rows="7" id="enterBody" class="form-control placeholder="Enter blog content...">{{ old('body') }}</textarea>
                    <x-error name="body" />
                </div>
                <div class="form-group mb-4">
                    <label for="thumbnail" class="mb-3">Cover Photo</label>
                    <input name="thumbnail" type="file" class="form-control" id="thumbnail" />
                    <x-error name="thumbnail" />
                </div>
                <button type="submit" class="btn btn-primary">
                    Create
                </button>
            </form>
        </x-card-wrapper>
    </div>
</x-layout>
