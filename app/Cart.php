<?php


namespace App;


use Illuminate\Support\Facades\Session;

class Cart
{
    public $totalQty = 0;
    public $items = null;

    public function __construct($oldItem)
    {
        if ($oldItem) {
            $this->totalQty = $oldItem->totalQty;
            $this->items = $oldItem->items;
        }
    }

    public function add($book_id)
    {
        $book = Book::FindOrFail($book_id);
        $newStoreCart = ['qty' => 0, 'book' => $book];
        if ($this->items) {
            if (array_key_exists($book_id, $this->items)) {
                $newStoreCart = $this->items[$book_id];
            }
        }
        $newStoreCart['qty']++;
        $newStoreCart['book'] = $book;
        $this->totalQty++;
        if ($this->totalQty > $book->qty) {
Session::flash('success', 'This book is temporarily no longer available ,please select other book');
            return redirect()->route('books.index');
        } else {
            $this->items[$book_id] = $newStoreCart;
        }
    }
}