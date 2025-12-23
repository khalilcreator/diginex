@extends('layouts.admin')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        {{ __('Blogs') }}
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm">Add New</a>
    </div>

    <div class="card-body">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blogs as $index => $blog)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>
                        @if($blog->image)
                            <img src="{{ asset($blog->image) }}" width="50" alt="Img">
                        @endif
                    </td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->category->name }}</td>
                    <td>{{ $blog->user->name }}</td>
                    <td>
                        @if($blog->status)
                            <span class="badge bg-success">Published</span>
                        @else
                            <span class="badge bg-secondary">Draft/Blocked</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this blog?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
