<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Menampilkan daftar produk
    public function index()
    {
        return ProductResource::collection(Product::all());
    }

    // Menampilkan detail produk berdasarkan ID
    public function show($id)
    {
        return new ProductResource(Product::findOrFail($id));
    }

    // Menambahkan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'category' => 'required|string',
            'brand' => 'required|string',
            'image_url' => 'required|string',
        ]);

        $product = Product::create($request->all());

        return new ProductResource($product);
    }

    // Memperbarui produk
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        
        $request->validate([
            'name' => 'string|max:255',
            'description' => 'string',
            'price' => 'numeric',
            'stock' => 'integer',
            'category' => 'string',
            'brand' => 'string',
            'image_url' => 'string',
        ]);

        $product->update($request->all());

        return new ProductResource($product);
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
