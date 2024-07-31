@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Publishers</h1>
    <a href="{{ route('publishers.create') }}" class="btn btn-primary mb-3">Create Publisher</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($publishers as $publisher)
                <tr>
                    <td>{{ $publisher->name }}</td>
                    <td>
                        <a href="{{ route('publishers.edit', $publisher) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('publishers.destroy', $publisher) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
