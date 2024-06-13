<!-- resources/views/invoices/index.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Invoices</h1>
                <a href="{{ route('invoices.create') }}" class="btn btn-primary mb-3">Create New Invoice</a>
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <ul class="list-group">
                    @forelse ($invoices as $invoice)
                        <li class="list-group-item">
                            <strong>Invoice #{{ $invoice->id }}</strong> - Customer: {{ $invoice->customer_name }}
                            <div class="float-right">
                                <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-sm btn-info">View</a>
                                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">No invoices found.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
@endsection
