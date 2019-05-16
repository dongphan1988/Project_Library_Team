<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('categories.list', compact('categories'));
    }
    public function create(){
        $category = Category::all();
        return view('categories.create');
    }

    public function store(Request $request){
        $category = new Category();
        $category->name = $request->input('name');
        if($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('images', 'public');
            $category->image = $path;
        }        $category->save();

        Session::flash('success', 'Thêm mới thể loại thành công');
        return redirect()->route('categories.index');
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }


    public function update(Request $request, $id){
        $category = Category::findOrFail($id);
        $category->name     = $request->input('name');
        if($request->hasFile('image')){
            $image = $request->image;
            $path = $image->store('images', 'public');
            $category->image = $path;
        }
        $category->save();

        Session::flash('success', 'Cập nhật thể loại sách thành công');
        return redirect()->route('categories.index');
    }


    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();

        Session::flash('success', 'Xóa thể loại sách thành công');
        return redirect()->route('categories.index');
    }
}
