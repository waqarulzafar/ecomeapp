<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(){
        return view('admin.category.create');
    }
    public function store(Request $request){
        $this->validate($request,['name'=>'required|min:3','desc'=>'required']);

        $category=new Category();
        $category->name=$request->name;
        $category->desc=$request->desc;
        $category->save();
        return redirect()->back()->with('success','Category added successfully....');



    }
}
