@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Title
                    </th>
                    <th>
                        Image
                    </th>
                    <th>
                        Content
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
                </thead>
                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td>
                                {{$post->title}}
                            </td>
                            <td>
                            <img src="{{$post->featured}}" alt="{{$post->title}}" width="50px" height="50px">
                            </td>
                            <td>
                                {{$post->content}}
                            </td>
                            <td>
                                <a href="#" class="btn btn-xs btn-info">
                                    Edit
                                </a>
                            </td>
                            <td>    
                                <a href="#" class="btn btn-xs btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection