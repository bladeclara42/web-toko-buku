<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\InvoiceMail;

class OrderItemController extends Controller
{
    public function create(Book $book)
    {
        return view('order.create', compact('book'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|numeric|min:1',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($request->quantity > $book->stock) {
            return back()->withErrors(['message' => 'Quantity exceeds available stock']);
        }

        $totalPrice = $book->price * $request->quantity;

        $order = Order::create([
            'user_id' => auth()->id(),
            'order_date' => now(),
            'subtotal' => $totalPrice,
            'shipping' => 0,
            'total' => $totalPrice,
            'status' => 'Pending',
        ]);

        $orderItem = OrderItem::create([
            'order_id' => $order->id,
            'book_id' => $request->book_id,
            'quantity' => $request->quantity,
            'price' => $book->price, 
        ]);

        $book->decrement('stock', $request->quantity);

        Mail::to(auth()->user()->email)->send(new InvoiceMail($orderItem));

        return redirect()->route('order.invoice', $orderItem);
    }

    public function invoice(OrderItem $orderItem)
    {
        $orderItem->load('book');
        
        return view('order.invoice', compact('orderItem'));
    }
}
