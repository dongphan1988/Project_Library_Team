<?php

namespace App\Http\Controllers;
use App\Book;
use App\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
$carts = Session::get('cart');
return view('carts.index', compact('carts'));
    }
    public function add($bookId)
    {
        $book = Book::FindOrFail($bookId);

            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $cart->add($bookId);
            Session::put('cart', $cart);
            return redirect()->route('books.index');
        }
}
