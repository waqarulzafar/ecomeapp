@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <span>Products</span>
                        <span><a href="{{route('product.create')}}" class="btn-primary btn">Add Product</a></span>
                    </div>

                    <div class="card-body">
                        <form action="{{route('product.show')}}" method="GET">
                            <div class="row mb-2">
                            <div class="col-md-2">
                                <select name="category_id" class="form-control form-select">
                                    <option value="">--All--</option>
                                    @foreach($categories as $cat)
                                        <option value="{{$cat->id}}" {{request('category_id')==$cat->id?'selected':''}}>{{$cat->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                             <div class="col-md-2">
                                 <input type="text" value="{{request('title')}}" class="form-control" name="title" placeholder="Search By Title">
                             </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>

                    </div>
                        </form>
                        @if(session('success'))
                            <div class="alert alert-success">{{session('success')}}</div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Desc</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                            <th>Actions</th>
                            </thead>
                            <tbody>
                            @foreach($products as $product)
                                <tr>
                                    <td>{{$product->id}}</td>
                                    <td>
                                        @if($product->category)
                                            {{$product->category->name}}
                                        @else
                                            --
                                        @endif


                                    </td>
                                    <td>
                                        <img src="{{asset($product->product_picture)}}" width="100px">
                                    </td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->desc}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->stock}}</td>
                                    <td>
                                        @if($product->status=='Active')
                                            <span class="badge bg-success"> {{$product->status}}</span>
                                        @else
                                            <span class="badge bg-danger"> {{$product->status}}</span>
                                        @endif



                                    </td>
                                    <td>
                                        <a href="{{route('category.edit',$product->id)}}" class="btn btn-primary">Edit</a>
                                        <a href="{{route('category.delete',$product->id)}}" class="btn btn-danger">Delete</a>
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
