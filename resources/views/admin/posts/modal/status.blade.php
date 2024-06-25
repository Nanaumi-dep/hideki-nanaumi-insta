{{-- Hide --}}
<div class="modal fade" id="hide-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-dangaer">
                    <i class="fa-solid fa-eye-slash"></i> Hide Post
                </h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to hide this post?</p>
                <div class="mt-3">
                    <img src="{{ $post->image }}" alt="post id {{ $post->id }}" class="w-100">
                    <p class="mt-1 text-muted">{{ $post->description }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.posts.hide', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <button type="button" class="btn btn-outline-danger btm-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger btm-sm">Hide</button>
                </form>
            </div>
        </div>
    </div>
</div>


{{-- Unhide --}}
<div class="modal fade" id="unhide-post-{{ $post->id }}">
    <div class="modal-dialog">
        <div class="modal-content border-primary">
            <div class="modal-header border-primary">
                <h5 class="modal-title text-primary">
                    <i class="fa-solid fa-eye"></i> Unhide Post
                </h5>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to unhide this post?</p>
                <div class="mt-3">
                    <img src="{{ $post->image }}" alt="post id {{ $post->id }}" class="w-100">
                    <p class="mt-1 text-muted">{{ $post->description }}</p>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('admin.posts.unhide', $post->id) }}" method="post">
                    @csrf
                    @method('PATCH')

                    <button type="button" class="btn btn-outline-primary btm-sm" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary btm-sm">Unhide</button>
                </form>
            </div>
        </div>
    </div>
</div>