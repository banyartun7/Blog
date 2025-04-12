@props(['blog'])
<form action="/blogs/{{ $blog->slug }}/comments" method="POST">
    @csrf
    <div class="form-group">
        <textarea class="form-control border border-0" name="comment" cols="5" placeholder="say somethings..." rows="5"></textarea>
        <x-error name="comment" />
    </div>
    <div class="d-flex justify-content-end mt-3">
        <button type="submit" class="btn btn-primary">
            Enter
        </button>
    </div>
</form>
