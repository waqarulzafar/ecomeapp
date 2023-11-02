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
                        <form method="post" action="{{route('category.store')}}">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Category name">
                                    @error('name')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12 form-group">
                                    <textarea name="desc" class="form-control @error('desc') is-invalid @enderror" placeholder="Category Description"></textarea>
                                    @error('desc')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button class="btn btn-primary" type="submit">Create Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
