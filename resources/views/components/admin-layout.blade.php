<x-layout>
    <x-slot name="title">
        <title>Blog Create Form</title>
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="col-md-2 mt-5">
                <ul class="list-group mt-4">
                    <li class="list-group-item"><a class="nav-link" href="{{ route('blogs.index') }}">Dashboard</a></li>
                    <li class="list-group-item"><a class="nav-link" href="{{ route('blogs.create') }}">Create</a></li>
                </ul>
            </div>
            <div class="col-md-10">

                {{ $slot }}
            </div>
        </div>
    </div>
</x-layout>
