@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Book</h1>
    <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $book->title }}">
        </div>
        <div class="form-group">
            <label for="cover">Cover</label>
            <input type="file" name="cover" id="cover" class="form-control">
            @if($book->cover)
                <img src="{{ asset('storage/' . $book->cover) }}" alt="{{ $book->title }}" class="img-thumbnail mt-2" style="width: 150px;">
            @endif
        </div>
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control">{{ $book->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <input type="text" name="type" id="type" class="form-control" value="{{ $book->type }}">
        </div>
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ $book->price }}">
        </div>
        <div class="form-group">
            <label for="published_year">Published Year</label>
            <input type="number" name="published_year" id="published_year" class="form-control" value="{{ $book->published_year }}">
        </div>
        <div class="form-group">
            <label for="stock">Stock</label>
            <input type="number" name="stock" id="stock" class="form-control" value="{{ $book->stock }}">
        </div>
        <div class="form-group">
            <label for="author_id">Author</label>
            <select name="author_id" id="author_id" class="form-control">
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
            <a href="{{ route('authors.create') }}" class="btn btn-primary mt-2">Create New Author</a>
            <a href="{{ route('authors.store') }}" class="btn btn-success mt-2">List Author</a>
        </div>
        <div class="form-group">
            <label for="publisher_id">Publisher</label>
            <select name="publisher_id" id="publisher_id" class="form-control">
                @foreach($publishers as $publisher)
                    <option value="{{ $publisher->id }}" {{ $publisher->id == $book->publisher_id ? 'selected' : '' }}>{{ $publisher->name }}</option>
                @endforeach
            </select>
            <a href="{{ route('publishers.create') }}" class="btn btn-primary mt-2">Create New Publisher</a>
            <a href="{{ route('publishers.store') }}" class="btn btn-success mt-2">List Publisher</a>
        </div>
        <div class="form-group">
            <label for="condition_id">Condition</label>
            <select name="condition_id" id="condition_id" class="form-control">
                @foreach($conditions as $condition)
                    <option value="{{ $condition->id }}" {{ $condition->id == $book->condition_id ? 'selected' : '' }}>{{ $condition->condition }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <form action="{{ route('books.destroy', $book) }}" method="POST" style="margin-top: 10px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
