@extends('layouts.admin')

@section('page_title', 'Edit Service')

@section('content')
<div class="card">
    <div class="card-header">Edit Service</div>
    <div class="card-body">
        <form action="{{ route('admin.service.update', $service->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $service->title }}" required>
            </div>
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control" rows="4" required>{{ $service->description }}</textarea>
            </div>
             <div class="mb-3">
                <label>Current Icon</label>
                <div>
                     @if($service->icon)
                        <img src="{{ asset('storage/'.$service->icon) }}" width="60">
                    @else
                        -
                    @endif
                </div>
            </div>
            <div class="mb-3">
                <label>Change Icon</label>
                <input type="file" name="icon" class="form-control">
            </div>
            <div class="mb-3">
                <label>Position</label>
                <input type="number" name="position" class="form-control" value="{{ $service->position }}">
            </div>
            <button class="btn btn-success">Update Service</button>
        </form>
    </div>
</div>
@endsection
