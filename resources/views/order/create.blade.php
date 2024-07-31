@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Order</h1>
    <form action="{{ route('order.store') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Complete Order</button>
    </form>
</div>
@endsection