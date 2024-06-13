@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Fruit Categories</h1>
                <a href="{{ route('fruit-categories.create') }}" class="btn btn-primary mb-3">Create New Category</a>
                <ul class="list-group">
                    @foreach($categories as $category)
                        <li class="list-group-item">
                            {{ $category->name }}
                            <div class="float-right">
                                <a href="{{ route('fruit-categories.edit', $category->id) }}" class="btn btn-sm btn-primary mr-2">Edit</a>
                                <form action="{{ route('fruit-categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
