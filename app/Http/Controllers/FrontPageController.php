<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FrontPageController extends Controller
{
    public function products(){
        $products=Product::all();
        return view('frontpages.products',compact('products'));
    }

    public function addToCard($id){

        $product=Product::find($id);

//        Session::forget('cart');
//        dd(Session::get('cart'));
        $oldCart=Session::get('cart1')?Session::get('cart1'):null;

        $cart=$oldCart?$oldCart:new Cart($oldCart);


        $cart->addCart($product);
        Session::put('cart1',$cart);
//        dd($cart->getProducts());

        return redirect()->back()->with('success','Product added successfully...');


    }

    public function cart(){
        $oldCart=Session::get('cart1')?Session::get('cart1'):null;

        $cart=$oldCart?$oldCart:new Cart($oldCart);

        return view('frontpages.cart',compact('cart'));
    }

    public function updateCart($id,Request $request){
        $oldCart=Session::get('cart1')?Session::get('cart1'):null;
        $product=Product::find($id);
        $cart=$oldCart?$oldCart:new Cart($oldCart);
        $cart->updateQty($product,$request->qty);
        return redirect()->back()->with('success','Cart Updated Susccessfully...');

    }

}
