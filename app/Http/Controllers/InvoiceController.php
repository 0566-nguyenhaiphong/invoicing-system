<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\FruitItem;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        return view('invoices.index', compact('invoices'));
    }

    public function create()
    {
        $fruitItems = FruitItem::all();
        return view('invoices.create', compact('fruitItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'fruit_items' => 'required|array',
            'fruit_items.*' => 'exists:fruit_items,id',
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
            'prices' => 'required|array',
            'prices.*' => 'required|numeric|min:0',
        ]);

        $invoice = Invoice::create([
            'customer_name' => $request->customer_name,
        ]);

        foreach ($request->fruit_items as $index => $fruitItemId) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'fruit_item_id' => $fruitItemId,
                'quantity' => $request->quantities[$index],
                'amount' => $request->prices[$index],
            ]);
        }

        return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
    }

    public function show($id)
    {
        $invoice = Invoice::with('items.fruitItem')->findOrFail($id);
        return view('invoices.show', compact('invoice'));
    }

    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $fruitItems = FruitItem::all();
        return view('invoices.edit', compact('invoice', 'fruitItems'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'fruit_items' => 'required|array',
            'fruit_items.*' => 'exists:fruit_items,id',
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
            'prices' => 'required|array',
            'prices.*' => 'required|numeric|min:0',
        ]);

        $invoice = Invoice::findOrFail($id);
        $invoice->update([
            'customer_name' => $request->customer_name,
        ]);

        // Xóa các mục hiện tại và thêm lại các mục mới
        $invoice->items()->delete();

        foreach ($request->fruit_items as $index => $fruitItemId) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'fruit_item_id' => $fruitItemId,
                'quantity' => $request->quantities[$index],
                'amount' => $request->prices[$index],
            ]);
        }

        return redirect()->route('invoices.index')->with('success', 'Invoice updated successfully.');
    }

    public function destroy($id)
    {
        $invoice = Invoice::findOrFail($id);
        $invoice->items()->delete();
        $invoice->delete();

        return redirect()->route('invoices.index')->with('success', 'Invoice deleted successfully.');
    }
    public function print($id)
    {
        $invoice = Invoice::with('items.fruitItem')->findOrFail($id);

        return view('invoices.print', compact('invoice'));
    }

}

