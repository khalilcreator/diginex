@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header">{{ __('Create Blog') }}</div>

    <div class="card-body">
        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Slug</label>
                <input type="text" name="slug" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label>Description (Short)</label>
                <textarea name="description" class="form-control" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label>Content (Full)</label>
                <textarea name="content" id="summernote"></textarea>
            </div>
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>
            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="status" id="status" checked>
                    <label class="form-check-label" for="status">
                        Publish Immediately
                    </label>
                </div>
            </div>
            <button class="btn btn-success">Save</button>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#summernote').summernote({
        placeholder: 'Write your blog content here...',
        tabsize: 2,
        height: 300
    });
</script>
@endsection
