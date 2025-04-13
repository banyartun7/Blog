<x-layout>
    <x-slot name="title">
        <title>{{ $blog->title }}</title>
    </x-slot>
    @if (session('status'))
        <div class="alert alert-success text-center">
            {{ session('status') }}
        </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="https://creativecoder.s3.ap-southeast-1.amazonaws.com/blogs/GOLwpsybfhxH0DW8O6tRvpm4jCR6MZvDtGOFgjq0.jpg"
                    class="card-img-top" alt="..." />
                <h3 class="my-3">{{ $blog->title }}</h3>
                <div>
                    <div>
                        <a href="/users/{{ $blog->author->username }}">{{ $blog->author->name }}</a>
                    </div>
                    <div>
                        <i>Category: </i>
                        <a href="/categories/{{ $blog->category->slug }}" class="badge bg-primary">
                            {{ $blog->category->name }}
                        </a>
                    </div>
                    <div class="text-secondary">
                        published - {{ $blog->created_at->diffForHumans() }}
                    </div>
                </div>
                <form action="/blogs/{{ $blog->slug }}/subscription" method="POST">
                    @csrf
                    @auth
                        @if (auth()->user()->isSubscribed($blog))
                            <button class="text-white btn btn-danger">Unsubscribe</button>
                        @else
                            <button class="text-white btn btn-warning">Subscribe</button>
                        @endif
                    @endauth
                </form>
                <p class="lh-md mt-3">
                    {{ $blog->body }}
                </p>
            </div>
        </div>
    </div>
    @auth
        <section class="container">
            <div class="col-md-8 mx-auto">
                <x-card-wrapper class="bg-light">
                    <x-comment-form :blog="$blog" />
                </x-card-wrapper>
            </div>
        </section>
    @endauth
    @if ($blog->comments->count() > 0)
        <x-comments :comments="$blog->comments()->latest()->paginate(3)" />
    @endif
    @guest
        <p class="text-center">
            Please <a href="/login">login</a> into participate in this discussion.
        </p>
    @endguest
    <x-blog-you-may-like :randomBlogs="$randomBlogs" />
</x-layout>
