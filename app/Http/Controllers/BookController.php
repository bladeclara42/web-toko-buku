<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Publisher;
use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('home', compact('books'));
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $conditions = Condition::all();
        return view('books.create', compact('authors', 'publishers', 'conditions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'published_year' => 'required|integer',
            'stock' => 'required|integer|min:1',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'condition_id' => 'required|exists:conditions,id',
        ]);

        $coverPath = null;
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('covers', 'public');
        }

        Book::create([
            'author_id' => $request->author_id,
            'publisher_id' => $request->publisher_id,
            'condition_id' => $request->condition_id,
            'title' => $request->title,
            'cover' => $coverPath,
            'description' => $request->description,
            'type' => $request->type,
            'price' => $request->price,
            'published_year' => $request->published_year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('home');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $conditions = Condition::all();
        return view('books.edit', compact('book', 'authors', 'publishers', 'conditions'));
    }

    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'cover' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'type' => 'required',
            'price' => 'required|numeric',
            'published_year' => 'required|integer',
            'stock' => 'required|integer|min:1',
            'author_id' => 'required|exists:authors,id',
            'publisher_id' => 'required|exists:publishers,id',
            'condition_id' => 'required|exists:conditions,id',
        ]);

        if ($request->hasFile('cover')) {
            if ($book->cover) {
                Storage::delete('public/' . $book->cover);
            }
            $coverPath = $request->file('cover')->store('covers', 'public');
        } else {
            $coverPath = $book->cover;
        }

        $book->update([
            'author_id' => $request->author_id,
            'publisher_id' => $request->publisher_id,
            'condition_id' => $request->condition_id,
            'title' => $request->title,
            'cover' => $coverPath,
            'description' => $request->description,
            'type' => $request->type,
            'price' => $request->price,
            'published_year' => $request->published_year,
            'stock' => $request->stock,
        ]);

        return redirect()->route('home');
    }

    public function destroy(Book $book)
    {
        if ($book->cover) {
            Storage::delete('public/' . $book->cover);
        }
        $book->delete();
        return redirect()->route('home');
    }
}
