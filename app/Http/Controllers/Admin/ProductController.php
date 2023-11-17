<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(){
        $categories=Category::all();
        return view('admin.product.create',compact('categories'));
    }
    public function store(Request $request){
        $this->validate($request,['title'=>'required','price'=>'required']);

        $filename='';
        if ($request->hasFile('default_picture')){
            $filename=$request->file('default_picture')->store('product',['disk'=>'public']);
        }
        $product=new Product();
        $product->category_id=$request->category_id;
        $product->title=$request->title;
        $product->desc=$request->desc;
        $product->price=$request->price;
        $product->stock=$request->stock;
        $product->default_picture=$filename;
        $product->save();
        return redirect(route('product.show'))->with('success','Product created successfully...');

    }

    public function index(Request $request){

        $products=Product::when($request->category_id!='',function($q) use ($request){
            return $q->where('category_id',$request->category_id);
        })->when($request->title!='',function($q) use ($request){
            return $q->where('title','Like','%'.$request->title.'%');
        })->paginate(10);



        $categories=Category::all();
        return view('admin.product.index',compact('products','categories'));
    }
}
