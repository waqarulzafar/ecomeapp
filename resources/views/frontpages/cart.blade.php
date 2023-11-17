@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Total</th>
                    </thead>
                    <tbody>
                    @foreach($cart->getProducts() as $pr)
                        <tr>
                            <td>{{$pr['product']->title}} ({{$pr['product']['price']}})</td>
                            <td>
                                <form action="{{route('cart.update',$pr['id'])}}" method="GET">
                                    <input type="number" name="qty" value="{{$pr['qty']}}">
                                    <button class="btn btn-danger btn-sm">Update</button>
                                </form>
                                </td>
                            <td>{{$pr['qty']*$pr['product']->price}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
