@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Invoice</h1>
    <p>Book: {{ $orderItem->book->title }}</p>
    <p>Quantity: {{ $orderItem->quantity }}</p>
    <p>Price per item: {{ $orderItem->price }}</p>
    <p>Total Price: {{ $orderItem->quantity * $orderItem->price }}</p>
    <a href="{{ route('home') }}" class="btn btn-primary">Back to Store</a>
</div>
@endsection
