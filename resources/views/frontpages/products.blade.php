@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach($products as $pr)
                <div class="col-md-3">
                    <div class="card mb-3">

                        <div class="card-header">

                            <img src="{{$pr->product_picture}}" class="card-img">
                            <h3 class="card-title">{{$pr->title}}</h3>
                        </div>
                        <div class="card-body">
                            <p>{{$pr->desc}}</p>
                            <p><label class="pr-price">{{$pr->price}}$</label></p>
                        </div>
                        <div class="card-footer">
                            <div class="add-to-card d-flex justify-content-end">
                                <a href="{{route('add-to-cart',$pr)}}" class="btn btn-danger">Add To cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
@endsection
