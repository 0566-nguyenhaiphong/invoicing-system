<!-- resources/views/invoices/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Edit Invoice #{{ $invoice->id }}</h1>
                <form action="{{ route('invoices.update', $invoice->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="customer_name">Customer Name:</label>
                        <input type="text" id="customer_name" name="customer_name" class="form-control" value="{{ $invoice->customer_name }}" required>
                    </div>
                    <hr>
                    <h3>Invoice Items</h3>
                    <div id="invoice_items">
                        @foreach ($invoice->items as $index => $item)
                            <div class="form-group">
                                <select name="fruit_items[]" class="form-control mb-2" required>
                                    <option value="">Select Fruit Item</option>
                                    @foreach ($fruitItems as $fruitItem)
                                        <option value="{{ $fruitItem->id }}" {{ $item->fruit_item_id == $fruitItem->id ? 'selected' : '' }}>{{ $fruitItem->name }}</option>
                                    @endforeach
                                </select>
                                <div class="form-row">
                                    <div class="col">
                                        <input type="number" name="quantities[]" class="form-control" value="{{ $item->quantity }}" placeholder="Quantity" required>
                                    </div>
                                    <div class="col">
                                        <input type="number" name="prices[]" class="form-control" value="{{ $item->amount }}" placeholder="Price" step="0.01" required>
                                    </div>
                                    <div class="col">
                                        <button type="button" class="btn btn-danger btn-remove-item">Remove</button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button type="button" class="btn btn-success btn-add-item">Add Item</button>
                    <button type="submit" class="btn btn-primary mt-3">Update Invoice</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.btn-add-item').click(function() {
                var itemHtml = `
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
                            <div class="col">
                                <button type="button" class="btn btn-danger btn-remove-item">Remove</button>
                            </div>
                        </div>
                    </div>
                `;
                $('#invoice_items').append(itemHtml);
            });

            $(document).on('click', '.btn-remove-item', function() {
                $(this).closest('.form-group').remove();
            });
        });
    </script>
@endsection
