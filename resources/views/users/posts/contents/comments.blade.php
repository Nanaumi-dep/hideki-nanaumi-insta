<div class="mt-3">
    {{-- Shwo all the comments here --}}

    <form action="{{ route('comment.store', $post->id )}}" method="post">
        @csrf

        <div class="input-group">
            {{-- The "$post->id" is the post being commented.  --}}
            <textarea name="comment_body{{ $post->id }}" rows="1" class="form-control form-control-sm" placeholder="Add a comment...">{{ old('comment.body'. $post->id) }}</textarea>
            <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
        </div>
        @error('comment_body', $post->id)
            <div class="text-danger small">{{ $message }}</div>
        @enderror
    </form>


</div>