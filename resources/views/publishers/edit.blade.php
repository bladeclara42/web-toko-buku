@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Publisher</h1>
    <form action="{{ route('publishers.update', $publisher) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $publisher->name }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    <form action="{{ route('publishers.destroy', $publisher) }}" method="POST" style="margin-top: 10px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
@endsection
