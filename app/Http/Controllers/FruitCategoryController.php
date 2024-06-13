<?php

namespace App\Http\Controllers;

use App\Models\FruitCategory;
use Illuminate\Http\Request;

class FruitCategoryController extends Controller
{
    public function index()
    {
        $categories = FruitCategory::all();
        return view('fruit-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('fruit-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        FruitCategory::create([
            'name' => $request->name,
        ]);

        return redirect()->route('fruit-categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = FruitCategory::findOrFail($id);
        return view('fruit-categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $category = FruitCategory::findOrFail($id);
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('fruit-categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = FruitCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('fruit-categories.index')->with('success', 'Category deleted successfully.');
    }
}

