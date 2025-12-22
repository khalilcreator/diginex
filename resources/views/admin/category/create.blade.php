@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Create Category') }}</div>

    <div class="card-body">
        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection
