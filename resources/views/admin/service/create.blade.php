@extends('layouts.admin')

@section('page_title', 'Add Service')

@section('content')
<div class="card">
    <div class="card-header">Create Service</div>
    <div class="card-body">
        <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4" required></textarea>
            </div>
            <div class="mb-3">
                <label>Icon</label>
                <input type="file" name="icon" class="form-control">
            </div>
            <div class="mb-3">
                <label>Position (Optional)</label>
                <input type="number" name="position" class="form-control" value="0">
            </div>
            <button class="btn btn-success">Save Service</button>
        </form>
    </div>
</div>
@endsection
