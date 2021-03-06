@extends('layouts.app')

@section('content')


    @include('errors')

    <div class="card">
        <div class="card-header">
            Update {{$post->title}}
        </div>

        <div class="card-body">
        <form action="{{route('post.update',['id'=>$post->id])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" value="{{$post->title}}">
                </div>

                <div class="form-group">
                        <label for="featured">Featured image</label>
                        <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group">
                    <label for="tags">Tags</label>
                    @foreach($tags as $tag)
                        <div class="checkbox">
                            <label><input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                @foreach($post->tags as $t)
                                    @if($t->id == $tag->id)
                                        Checked
                                    @endif
                                @endforeach
                                > {{$tag->tag}}</label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="10" cols="90">{{$post->content}}</textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update post</button>
                    </div>
                </div>
             </form>
        </div>

    </div>


@endsection