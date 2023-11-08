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

    public function edit($id){
        $category=Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    public function index(){
        $categories=Category::paginate(10);
        return view('admin.category.index',compact('categories'));
    }
    public function store(Request $request){
        $this->validate($request,['name'=>'required|min:3','desc'=>'required']);

        $category=new Category();
        $category->name=$request->name;
        $category->desc=$request->desc;
        $category->save();
        return redirect()->back()->with('success','Category added successfully....');



    }
    public function update($id,Request $request){
        $this->validate($request,['name'=>'required|min:3','desc'=>'required']);

        $category=Category::find($id);
        $category->name=$request->name;
        $category->desc=$request->desc;
        $category->update();
        return redirect()->back()->with('success','Category Updated successfully....');
    }
    public function delete($id){
        $category=Category::find($id);
        if ($category){
            $category->delete();
           return redirect()->back()->with('success','Category Deleted Successfully...');
        }
        return redirect()->back()->with('error','Error while deleting category....');
    }
}
