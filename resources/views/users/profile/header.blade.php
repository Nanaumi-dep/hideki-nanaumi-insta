<div class="row">
    <div class="col-4">
        @if ($user->avatar)
            <img src="{{ $user->avatar }}" alt="{{ $user->name }}" class="img-thumbnail rounded-circle d-blook mx-auto avatar-lg">
        @else
            <i class="fa-solid fa-circle-user text-secondary d-block text-center icon-lg"></i>
        @endif
    </div>
    <div class="col-8">
        <div class="row mb-3">
            <div class="col-auto">
                <h2 class="display-6 mb-0">{{ $user->name }}</h2>
            </div>
            <div class="col-auto p-2">
                @if (Auth::user()->id === $user->id)
                    <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary btn-sm fw-bold">Edit Profile</a>
                @else
                    @if ($user->isFollowed())
                        <form action="{{ route('follow.destroy', $user->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-outline-secondary btn-sm fw-bold">Following</button>
                        </form> 
                    @else
                        <form action="{{ route('follow.store', $user->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm fw-bold">Follow</button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-auto">
                {{-- Show how many posts the user have --}}

                    {{-- @if ($user->posts->count() > 1)
                        <a href="#" class="text-decoration-none text-dark">
                            <strong>{{ $user->posts->count() }}</strong> posts
                        </a>
                    @else
                        <a href="#" class="text-decoration-none text-dark">
                            <strong>{{ $user->posts->count() }}</strong> post
                        </a>
                    @endif --}}

                <a href="#" class="text-decoration-none text-dark">
                    <strong>{{ $user->posts->count() }}</strong> {{ $user->posts->count() <= 1 ? 'Post':'Posts' }}
                </a>

            </div>

            <div class="col-auto">
                {{-- Show how many users the AUTH user is following --}}

                    {{-- @if ($user->followers->count() > 1)
                        <a href="#" class="text-decoration-none text-dark">
                            <strong>{{ $user->followers->count() }}</strong> followers
                        </a>
                    @else
                        <a href="#" class="text-decoration-none text-dark">
                            <strong>{{ $user->followers->count() }}</strong> follower
                        </a>
                    @endif --}}

                <a href="{{ route('profile.followers', $user->id) }}" class="text-decoration-none text-dark">
                    <strong>{{ $user->followers->count() }}</strong> {{ $user->followers->count() <= 1 ? 'Follower':'Followers' }}
                </a>
                

            </div>

            <div class="col-auto">
                {{-- Show how followers the AUTH user have --}}
                <a href="{{ route('profile.following', $user->id) }}" class="text-decoration-none text-dark">
                    <strong>{{ $user->following->count() }}</strong> Following
                </a>
            </div>
        </div>

        <p class="fw-bold">{{ $user->introduction }}</p>

    </div>
</div>