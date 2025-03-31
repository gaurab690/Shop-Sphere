@extends('admin.layouts.layout')
@section('admin_page_title')
    Edit Category
@endsection

@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Edit Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT') 

                        <!-- Category Name Input -->
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Name of Category</label>
                            <input type="text" class="form-control" id="category_name" name="name"
                                placeholder="Enter category name" value="{{ old('name', $category->name) }}" required>

                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
