@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ asset('storage/' . $book->cover) }}" class="img-fluid" alt="{{ $book->title }}">
        </div>
        <div class="col-md-6">
            <h1>{{ $book->title }}</h1>
            <p>{{ $book->description }}</p>
            <p>{{ $book->price }}</p>
            <a href="{{ route('order.create', $book) }}" class="btn btn-success">Buy Now</a>
        </div>
    </div>
</div>
@endsection
