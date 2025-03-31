@extends('admin.layouts.layout')
@section('admin_page_title')
    Create Category
@endsection

@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create Category</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf

                        <!-- Category Name Input -->
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Name of Category</label>
                            <input type="text" class="form-control" id="category_name" name="category_name"
                                placeholder="Enter category name" required>
                            <!-- Validation Error Message -->
                            @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Create Category</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
