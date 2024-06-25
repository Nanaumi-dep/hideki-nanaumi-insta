<div class="modal fade" id="delete-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">

            <div class="modal-header border-danger">
                <h3 class="h5 motal-title text-danger">
                    <i class="fa-solid fa-circle-exclamation"></i> Delete Post
                </h3>
            </div>

            <div class="modal-body">
                <p>Are you sure you want to dalete this post?</p>
                <div class="mt-3">
                    <img src="{{ $post->image}}" alt="post id {{ $post->id }}" class="image-lg w-50">
                    <p class="mt-1 text-muted">{{ $post->description }}</p>
                </div>
            </div>

            <div class="modal-footer border-0">
                <form action="{{ route('post.delete', $post->id)}}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                </form>
            </div>

        </div>
    </div>
</div>