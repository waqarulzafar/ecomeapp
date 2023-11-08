@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create Product</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-2">
                                <div class="col-md-12 form-group">
                                    <select name="category_id" class="form-control form-select">
                                        @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12 form-group">
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Enter Product title">
                                    @error('title')
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
                            <div class="row mb-2">
                                <div class="col-md-12 form-group">
                                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" placeholder="Enter Product Price">
                                    @error('price')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-12 form-group">
                                    <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" placeholder="Enter Product Stock">
                                    @error('stock')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-md-12 form-group">
                                   <input type="file" name="default_picture" class="form-control">
                                    @error('default_picture')
                                    <div class="invalid-feedback d-block">{{$message}}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-end">
                                    <button class="btn btn-primary" type="submit">Create Product</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
