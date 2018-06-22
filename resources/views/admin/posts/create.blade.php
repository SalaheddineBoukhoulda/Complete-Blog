@extends('layouts.app')

@section('content')


    @include('errors')

    <div class="card">
        <div class="card-header">
            Create a new post
        </div>

        <div class="card-body">
        <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>

                <div class="form-group">
                        <label for="featured">Featured image</label>
                        <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                        <label for="category_id">Category</label>
                        <select type="file" name="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                </div>

                <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="10" cols="90"></textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create post</button>
                    </div>
                </div>
             </form>
        </div>

    </div>


@endsection