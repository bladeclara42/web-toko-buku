@extends('layouts.app')

@section('content')
<div class="container">
    @can('admin')
        <div class="mb-3">
            <a href="{{ route('books.create') }}" class="btn btn-primary">Create a New Book</a>
        </div>
    @endcan
    <div class="row">
        @foreach($books as $book)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset('storage/' . $book->cover) }}" class="card-img-top" alt="{{ $book->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ $book->description }}</p>
                        <p class="card-text">{{ $book->price }}</p>
                        <a href="{{ route('books.show', $book) }}" class="btn btn-primary">View</a>
                        @can('admin')
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection



{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- @endsection --}}
