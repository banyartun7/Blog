@props(['comment'])
<x-card-wrapper>
    <div class="d-flex">
        <div>
            <img
                src="{{ asset('images/'.$comment->author->avatar) }}"
                width="50"
                height="50"
                class="rounded-circle"
                alt=""
            />
        </div>
        <div class="ms-3">
            <div class="d-flex align-items-center">
                <h6>{{ $comment->author->name }}</h6>
            </div>
            <p class="text-secondary">
                {{$comment->created_at->format("Fj, Y, g:i a")}}
            </p>
        </div>
    </div>
    <p class="mt-1">
        {{$comment->body}}
    </p>
</x-card-wrapper>
