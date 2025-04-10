@props(['blogs'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
        <x-category-drop-drown />
        <!-- <select name="" id="" class="p-1 rounded-pill mx-3">
            <option value="">Filter by Tag</option>
        </select> -->
    </div>
    <form action="" class="my-3" method="GET">
        <div class="input-group mb-3">
            @if(request('category'))
            <input
                name="category"
                type="hidden"
                value="{{ request('category') }}"
            />
            @endif @if(request('author'))
            <input
                name="author"
                type="hidden"
                value="{{ request('author') }}"
            />
            @endif
            <input
                name="search"
                type="text"
                autocomplete="false"
                class="form-control"
                value="{{ request('search') }}"
                placeholder="Search Blogs..."
            />
            <button
                class="input-group-text bg-primary text-light"
                id="basic-addon2"
                type="submit"
            >
                Search
            </button>
        </div>
    </form>
    <div class="row">
        @forelse ($blogs as $blog)
        <div class="col-md-4 mb-4">
            <x-blog-card :blog="$blog" />
        </div>
        @empty
        <h4 class="text-danger">No blogs found</h4>
        @endforelse
        {{$blogs->links()}}
    </div>
</section>
