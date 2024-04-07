@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('post.update' , $post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="row mb-3">
                <label for="title" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                           value="{{ $post->title }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="Content" class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="content" id="content"
                              placeholder="Content">{{ $post->title }}</textarea>
                </div>
            </div>
            <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="text" name="image" class="form-control" id="image" placeholder="Image"
                           value="{{ $post->image }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="Category" class="col-sm-2 col-form-label">Category</label>
                <select class="form-select" aria-label="Default select example" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{ $category->id === $post->category->id ? 'selected' : ''}}

                            value="{{$category->id}}">{{$category->title}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="row mb-3">
                <label for="tags" class="col-sm-2 col-form-label">Tags</label>
                <select class="form-select" multiple aria-label="Multiple select example" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option
                            @foreach($post->tags as $postTag)
                                {{ $tag->id === $postTag->id ? 'selected' : ''}}
                            @endforeach
                            value="{{ $tag->id }}">{{ $tag->title }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
