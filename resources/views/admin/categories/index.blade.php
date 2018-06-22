@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Name
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
                </thead>
                <tbody>
                    @foreach($categories as $categorie)
                        <tr>
                            <td>
                                {{$categorie->name}}
                            </td>
                            <td>
                                <a href="{{route('category.edit',['id' => $categorie->id])}}" class="btn btn-xs btn-info">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                            </td>
                            <td>    
                                <a href="{{route('category.delete',['id' => $categorie->id])}}" class="btn btn-xs btn-danger">
                                    <span class="glyphicon glyphicon-minus"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection