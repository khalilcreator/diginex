@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Edit Category') }}</div>

    <div class="card-body">
        <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
            </div>
            <div class="mb-3">
                <label>Current Image</label>
                <div>
                    @if($category->image)
                        <img src="{{ asset('storage/'.$category->image) }}" width="100" alt="Img">
                    @endif
                </div>
            </div>
            <div class="mb-3">
                <label>Change Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <button class="btn btn-success">Update</button>
        </form>
    </div>
</div>
@endsection
