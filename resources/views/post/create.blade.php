@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.store')}}" method="post">
            @csrf
            <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input

                        value="{{ old('title') }}"

                        type="text" name="title" class="form-control" id="title" placeholder="Title">
                    @error('title')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="content" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="content" id="content"
                              placeholder="Content">{{ old('content') }}</textarea>
                </div>
                @error('content')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input
                        value="{{ old('image') }}"
                        type="text" name="image" class="form-control" id="image" placeholder="Image">
                </div>
                @error('image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="row mb-3">
                <label for="Category" class="col-sm-2 col-form-label">Category</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-3">
                <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                <select class="form-select" multiple aria-label="Multiple select example" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
