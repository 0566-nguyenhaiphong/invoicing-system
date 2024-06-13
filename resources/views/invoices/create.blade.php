<!-- resources/views/invoices/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Create Invoice</h1>
                <form action="{{ route('invoices.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="customer_name">Customer Name:</label>
                        <input type="text" id="customer_name" name="customer_name" class="form-control" required>
                    </div>
                    <hr>
                    <h3>Invoice Items</h3>
                    <div id="invoice_items">
                        <div class="form-group">
                            <select name="fruit_items[]" class="form-control mb-2" required>
                                <option value="">Select Fruit Item</option>
                                @foreach ($fruitItems as $fruitItem)
                                    <option value="{{ $fruitItem->id }}">{{ $fruitItem->name }}</option>
                                @endforeach
                            </select>
                            <div class="form-row">
                                <div class="col">
                                    <input type="number" name="quantities[]" class="form-control" placeholder="Quantity" required>
                                </div>
                                <div class="col">
                                    <input type="number" name="prices[]" class="form-control" placeholder="Price" step="0.01" required>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <a href="/fruit-items/create" class="btn btn-success mt-3 btn-add-item">Add Fruit Item</a>
                        <button type="submit" class="btn btn-primary mt-3">Create Invoice</button>
                    </div>
                   
                </form>
            </div>
        </div>
    </div>
@endsection


