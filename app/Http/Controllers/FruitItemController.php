<?php

namespace App\Http\Controllers;

use App\Models\FruitItem;
use App\Models\FruitCategory;
use Illuminate\Http\Request;

class FruitItemController extends Controller
{
    public function index()
    {
        $items = FruitItem::with('category')->get();
        return view('fruit-items.index', compact('items'));
    }

    public function create()
    {
        $categories = FruitCategory::all();
        return view('fruit-items.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:fruit_categories,id',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric',
        ]);

        FruitItem::create($request->all());

        return redirect()->route('fruit-items.index')->with('success', 'Item created successfully.');
    }

    public function edit($id)
    {
        $item = FruitItem::findOrFail($id);
        $categories = FruitCategory::all();
        return view('fruit-items.edit', compact('item', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:fruit_categories,id',
            'unit' => 'required|string|max:50',
            'price' => 'required|numeric',
        ]);

        $item = FruitItem::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('fruit-items.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $item = FruitItem::findOrFail($id);
        $item->delete();

        return redirect()->route('fruit-items.index')->with('success', 'Item deleted successfully.');
    }
}
