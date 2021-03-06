@extends('layouts.app')

@section('content')


    @include('errors')

    <div class="card">
        <div class="card-header">
            Create a new category
        </div>

        <div class="card-body">
        <form action="{{route('category.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                        <label for="category">Name</label>
                        <input type="text" name="category_name" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create category</button>
                    </div>
                </div>
             </form>
        </div>

    </div>


@endsection