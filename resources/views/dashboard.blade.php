@extends('layouts.app')

@section('content')
    <div class="row">
            <div class="col-md-3">
                    <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center">Posted</div>
                            <div class="card-body">
                                <h1 class="text-center">{{$posted_count}}</h1>
                            </div>
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center">Trashed</div>
                        <div class="card-body">
                            <h1 class="text-center">{{$trashed_count}}</h1>
                        </div>
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center">Users</div>
                        <div class="card-body">
                            <h1 class="text-center">{{$users_count}}</h1>
                        </div>
                    </div>
            </div>

            <div class="col-md-3">
                    <div class="card text-white bg-success mb-3" style="max-width: 18rem;">
                        <div class="card-header text-center">Categories</div>
                        <div class="card-body">
                            <h1 class="text-center">{{$categories_count}}</h1>
                        </div>
                    </div>
            </div>
    </div>

@endsection
