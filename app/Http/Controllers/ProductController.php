<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function menu(): View
    {
        return view('menu', [
            'products' => Product::orderBy('id')->get(),
        ]);
    }

    public function index(): View
    {
        return view('admin.index', [
            'products' => Product::orderBy('id')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'tag' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
        ]);

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Producto agregado correctamente.');
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'tag' => 'nullable|string|max:255',
            'badge' => 'nullable|string|max:255',
        ]);

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado correctamente.');
    }
}
