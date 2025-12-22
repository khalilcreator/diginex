@extends('layouts.admin')

@section('page_title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card text-white bg-primary mb-3">
            <div class="card-header">Total Blogs</div>
            <div class="card-body">
                <h2 class="card-title">{{ \App\Models\Blog::count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-success mb-3">
            <div class="card-header">Categories</div>
            <div class="card-body">
                <h2 class="card-title">{{ \App\Models\Category::count() }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-white bg-warning mb-3">
            <div class="card-header">Users</div>
            <div class="card-body">
                <h2 class="card-title">{{ \App\Models\User::count() }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">Quick Actions</div>
    <div class="card-body">
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Create New Blog</a>
        <a href="{{ route('admin.category.create') }}" class="btn btn-outline-secondary">Add Category</a>
    </div>
</div>
@endsection
