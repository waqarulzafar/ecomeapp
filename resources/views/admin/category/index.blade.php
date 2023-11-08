@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Category</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Desc</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($categories as $cat)
                                <tr>
                                    <td>{{$cat->id}}</td>
                                    <td>{{$cat->name}}</td>
                                    <td>{{$cat->desc}}</td>
                                    <td>
                                        <a href="{{route('category.edit',$cat->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('category.delete',$cat->id)}}" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
