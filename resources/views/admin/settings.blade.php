@extends('admin.layouts.layout')
@section('admin_page_title')
    Settings
@endsection
@section('admin_layout')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Admin Settings</h5>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Store Name -->
                        <div class="mb-3">
                            <label class="form-label">Store Name</label>
                            <input type="text" class="form-control" name="store_name"
                                value="{{ old('store_name', $settings ? $settings->store_name : '') }}" >
                        </div>

                        <!-- Admin Email -->
                        <div class="mb-3">
                            <label class="form-label">Admin Email</label>
                            <input type="email" class="form-control" name="admin_email"
                                value="{{ old('admin_email', $settings ? $settings->admin_email : '') }}" >
                        </div>

                        <!-- Contact Number -->
                        <div class="mb-3">
                            <label class="form-label">Contact Number</label>
                            <input type="text" class="form-control" name="contact_number"
                                value="{{ old('contact_number', $settings ? $settings->contact_number : '') }}" >
                        </div>

                        <!-- Store Logo -->
                        <div class="mb-3">
                            <label class="form-label">Store Logo</label>
                            <input type="file" class="form-control" name="store_logo">
                            @if($settings->store_logo)
                                <img src="{{ asset('storage/' . $settings->store_logo) }}" alt="Store Logo" width="100">
                            @endif
                        </div>
                        

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Update Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
