@extends('layouts.app')

@section('content')


    @include('errors')

    <div class="card">
        <div class="card-header">
            Update settings
        </div>

        <div class="card-body">
        <form action="{{route('settings.update')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                        <label for="site_name">Site name</label>
                        <input type="text" name="site_name" value="{{$settings->site_name}}" class="form-control">
                </div>

                <div class="form-group">
                    <label for="site_email">E-mail</label>
                    <input type="email" name="site_email" value="{{$settings->site_email}}" class="form-control">
                </div>

                
                <div class="form-group">
                    <label for="site_number">Phone</label>
                    <input type="text" name="site_number" value="{{$settings->site_number}}" class="form-control">
                </div>

                
                <div class="form-group">
                    <label for="site_adress">Adress</label>
                    <input type="text" name="site_adress" value="{{$settings->site_adress}}" class="form-control">
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