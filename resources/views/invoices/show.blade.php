<!-- resources/views/invoices/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Invoice #{{ $invoice->id }}</h1>
                <p><strong>Customer Name:</strong> {{ $invoice->customer_name }}</p>
                <h3>Invoice Items</h3>
                <ul class="list-group">
                    @foreach ($invoice->items as $item)
                        <li class="list-group-item">
                            <strong>{{ $item->fruitItem->name }}</strong> - Quantity: {{ $item->quantity }} - Amount: {{ $item->amount }}
                        </li>
                    @endforeach
                </ul>
                <a href="{{ route('invoices.edit', $invoice->id) }}" class="btn btn-primary mt-3">Edit Invoice</a>
                <form action="{{ route('invoices.destroy', $invoice->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-3">Delete Invoice</button>
                </form>
                <a href="{{ route('invoices.print', ['id' => $invoice->id]) }}" class="btn btn-success mt-3">Print Invoice</a>
                <a href="/invoices" class="btn btn-info mt-3">Back</a>
            </div>
        </div>
    </div>
@endsection
