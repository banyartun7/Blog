<div class="dropdown">
    <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ isset($currentCategory) ? $currentCategory->name : 'Filter By Category' }}
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a href="/" class="dropdown-item">All</a>
        @foreach ($categories as $category)
            <a class="dropdown-item"
                href="/?category={{ $category->slug }}{{ request('search') ? '&search=' . request('search') : '' }}{{ request('author') ? '&author=' . request('author') : '' }}">{{ $category->name }}</a>
        @endforeach
    </div>
</div>
