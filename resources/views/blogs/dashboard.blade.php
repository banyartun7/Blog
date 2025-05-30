<x-admin-layout>
    @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif
    <h3 class="my-4 text-center">Admin Dashboard</h3>
    <x-card-wrapper>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Intro</th>
                    <th scope="col">Body</th>
                    <th scope="col">Category</th>
                    <th scope="col">Thumbnail</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $blog)
                    <tr>
                        <th scope="row">{{ $blog->id }}</th>
                        <td><a href="/blogs/{{ $blog->slug }}" target="_blank">{{ $blog->title }}</a></td>
                        <td>{{ $blog->slug }}</td>
                        <td>{{ $blog->intro }}</td>
                        <td>{{ substr($blog->body, 0, 100) }}</td>
                        <td>{{ $blog->category->name }}</td>
                        <td><img width="70" height="70" src="{{ asset('storage/' . $blog->thumbnail) }}" /></td>
                        <td>
                            <div class="d-flex align-items-center justify-content-between">
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="text-warning">Edit</a>
                                <form method="POST" action="{{ route('blogs.destroy', $blog->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Are you sure to delete this blog?')" type="submit"
                                        class="nav-link btn btn-link text-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </x-card-wrapper>
    {{ $blogs->links() }}
</x-admin-layout>
