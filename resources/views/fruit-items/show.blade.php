<!-- resources/views/fruit-items/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Fruit Item Details</h1>
        <table class="table">
            <tbody>
                <tr>
                    <th>Name</th>
                    <td>{{ $item->name }}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{ $item->category->name }}</td>
                </tr>
                <tr>
                    <th>Unit</th>
                    <td>{{ $item->unit }}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>${{ $item->price }}</td>
                </tr>
            </tbody>
        </table>
        <a href="{{ route('fruit-items.index') }}" class="btn btn-primary">Back to List</a>
    </div>
@endsection
