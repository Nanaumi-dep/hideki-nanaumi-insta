@extends('layouts.app')

@section('title','Edit Post')

@section('content')
        <form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div class="mb-3">
                <label for="category" class="form-label d-block fw-bold">
                    Category <Span class="text-muted fw-normal">(Up to 3)</Span>
                </label>
            </div>

            @foreach ($all_categories as $category)
                <div class="form-check form-check-inline">
                    @if (in_array($category->id, $selected_categories))
                        <input type="checkbox" name="category[]" id="{{ $category->name }}" class="form-check-input" value="{{ $category->id }}" checked>
                    @else
                        <input type="checkbox" name="category[]" id="{{ $category->name }}" class="form-check-input" value="{{ $category->id }}">
                        
                    @endif
                        <label for="{{ $category->name }}" class="form-check-label">{{ $category->name }}</label>
                </div>            
            @endforeach
            {{-- Error message here --}}
            @error('category')
                <div class="text-danger small">{{ $message }}</div>
            @enderror
            
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea name="description" id="description" rows="3" class="form-control" placeholder="What's on your mind">{{ old('description', $post->description) }}</textarea>
                @error('description')
                    <div class="text-danger small">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-4">
                <div class="col-6">
                    <label for="image" class="form-label fw-bold">Image</label>
                    <img src="{{ $post->image }}" alt="post id{{ $post->id }}" class="img-thumbnail w-100">
                    <input type="file" name="image" id="image" class="form-control mt-1" aria-roledescription="image-info">
                    <div class="form-text" id="image-info">
                        The accpetable formats are jpeg, png, and gif only. <br>
                        Max file size is 1048KB.
                    </div>
                    {{-- Error message here --}}
                    @error('image')
                        <div class="text-danger small">{{ $message }}</div>
                        
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-warning px-5">Save</button>
        </form>
@endsection