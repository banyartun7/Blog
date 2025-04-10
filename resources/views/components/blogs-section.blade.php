@props(['blogs', 'categories', 'currentCategory'])
<section class="container text-center" id="blogs">
    <h1 class="display-5 fw-bold mb-4">Blogs</h1>
    <div class="">
        <div class="dropdown">
            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ isset($currentCategory) ? $currentCategory->name : 'Filter By Category' }}
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                @foreach ($categories as $category)
                    <a class="dropdown-item" href="/categories/{{ $category->slug }}">{{ $category->name }}</a>
                @endforeach
            </div>
        </div>
        <!-- <select name="" id="" class="p-1 rounded-pill mx-3">
            <option value="">Filter by Tag</option>
        </select> -->
    </div>
    <form action="" class="my-3" method="GET">
        <div class="input-group mb-3">
            <input name="search" type="text" autocomplete="false" class="form-control"
                value="{{ request('search') }}" placeholder="Search Blogs..." />
            <button class="input-group-text bg-primary text-light" id="basic-addon2" type="submit">
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
        @endforelse;
    </div>
</section>
