<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Book;
use App\Category;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function destroy($bookId)
    {
        $book = Book::FindOrFail($bookId);
        $book->delete();
        Session::flash('success', 'delete complete');
        return redirect()->route('books.index');
    }

    public function create()
    {
        $categories = Category::all();
        if (count($categories) == 0) {
            Session::flash('success', 'category no date, you need create category before create books');
            return redirect()->route('books.create');
        } else
            return view('books.create', compact('categories'));
    }

    public function store(BookRequest $request)
    {
        $book = new Book();
        $book->name = $request->name;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->qty = $request->qty;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $path = $image->store('images', 'public');
            $book->image = $path;
        }
        $book->save();
        Session::flash('success', "create book success");
        return redirect()->route('books.create');
    }

    public function edit($bookId)
    {
        $book = Book::FindOrFail($bookId);
        $categories = Category::all();
        return view('books.update', compact('categories', 'book'));
    }

    public function update(BookRequest $request, $bookId)
    {
        $book = Book::FindOrFail($bookId);
        $book->name = $request->name;
        $book->description = $request->description;
        $book->category_id = $request->category_id;
        $book->qty = $request->qty;
        if ($request->hasFile('image')) {
            $image = $request->image;
            $path = $image->store('images', 'public');
            $book->image = $path;
        }
        $book->save();
        Session::flash('success', 'update complete');
        return redirect()->route('books.index');
    }
}
