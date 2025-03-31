<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.product.manage', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.product.create', compact('categories'));
    }

    public function manage()
    {
        return view('admin.product.manage');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string|min:5',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        Product::create([
            'name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'is_active' => true,
            'stock' => $request->stock,
        ]);

        toastr()->success('Product created successfully.');

        return redirect()->route('product.index');
    }


    public function show(string $id)
    {
        //
    }

    public function edit(Product $product)
    {
        // Get all categories to show in the dropdown
        $categories = Category::all();

        // Return the edit view with the product and categories
        return view('admin.product.edit', compact('product', 'categories'));
    }



    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:1',
            'description' => 'required|string|min:5|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'required|boolean',
        ]);

        $imagePath = $product->image; // Keep the old image if no new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if a new image is uploaded
            if ($product->image && file_exists(storage_path('app/public/' . $product->image))) {
                unlink(storage_path('app/public/' . $product->image));
            }

            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        $product->update([
            'name' => $request->name,  
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $imagePath,
            'is_active' => $request->is_active, 
            'stock' => $request->stock,
        ]);

        toastr()->success('Product updated successfully.');

        return redirect()->route('product.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
