@extends('layouts.app')

@section('content')


    @include('errors')

    <div class="card">
        <div class="card-header">
            Update {{$category->name}}
        </div>

        <div class="card-body">
        <form action="{{route('category.update',['id' => $category->id])}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                        <label for="category">Name</label>
                        <input type="text" name="category_name" value="{{$category->name}}" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
             </form>
        </div>

    </div>


@endsection