<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    public function create(){
        $category = Category::all();
        return view('categories.create');
    }

    public function store(CategoryRequest $request){
        $category = new Category();
        $category->name = $request->input('name');
        if($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('images', 'public');
            $category->image = $path;
        }        $category->save();

        Session::flash('success', 'add category sucess');
        return redirect()->route('categories.index');
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }


    public function update(CategoryRequest $request, $id){
        $category = Category::findOrFail($id);
        $category->name     = $request->input('name');
        if($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('images', 'public');
            $category->image = $path;
        }
        $category->save();

        Session::flash('success', 'update success');
        return redirect()->route('categories.index');
    }


    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();

        Session::flash('success', 'delete complete');
        return redirect()->route('categories.index');
    }
}
