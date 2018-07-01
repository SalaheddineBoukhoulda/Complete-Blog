@extends('layouts.app')

@section('content')


    @include('errors')

    <div class="card">
        <div class="card-header">
            Create a new user
        </div>

        <div class="card-body">
        <form action="{{route('user.store')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create user</button>
                    </div>
                </div>
             </form>
        </div>

    </div>


@endsection