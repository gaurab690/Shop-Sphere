<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    // Show all categories
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.manage', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function manage()
    {
        $categories = Category::all();
        return view('admin.category.manage', compact('categories'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,name|max:255|min:5',
        ]);

        $category = new Category();
        $category->name = $request->category_name;
        $category->save();

        return redirect()->back()->with('success', 'Category created successfully!');
    }


    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|min:5|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        session()->flash('success', 'Category has been updated successfully!');

        return redirect()->route('category.index');
    }


    public function destroy(Category $category)
    {
        $category->delete();
        session()->flash('success', 'Category has been deleted successfully!');
        return redirect()->route('category.index');
    }
}
