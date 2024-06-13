<!-- resources/views/invoices/print.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="invoice-header">
            <h1>Invoice #{{ $invoice->id }}</h1>
        </div>
        
        <div class="invoice-details">
            <p><strong>Customer Name:</strong> {{ $invoice->customer_name }}</p>
        </div>
        
        <table class="invoice-items">
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($invoice->items as $item)
                <tr>
                    <td>{{ $item->fruitItem->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>{{ $item->amount }}</td>
                    <td>{{ $item->quantity * $item->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <!-- Tính tổng cộng -->
        <div class="total">
            <p><strong>Total Amount:</strong> {{ $invoice->items->sum(function($item) {
                return $item->quantity * $item->amount;
            }) }}</p>
        </div>
        <a href="{{ route('invoices.show', $invoice->id) }}" class="btn btn-sm btn-info">Back</a>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            font-size: 24px;
            margin: 5px 0;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details p {
            margin: 5px 0;
        }
        .invoice-items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .invoice-items th, .invoice-items td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }
        .invoice-items th {
            background-color: #f0f0f0;
        }
        .total {
            margin-top: 20px;
        }
    </style>
@endsection
