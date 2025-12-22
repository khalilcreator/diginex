@extends('layouts.admin')

@section('page_title', 'Services')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>Manage Services</span>
        <a href="{{ route('admin.service.create') }}" class="btn btn-primary btn-sm">Add New</a>
    </div>
    <div class="card-body">
        <table class="table table-bordered data-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Icon</th>
                    <th>Title</th>
                    <th>Position</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $index => $service)
                <tr>
                    <td>{{ $index + 1 }}</td>
                     <td>
                        @if($service->icon)
                            <img src="{{ asset('storage/'.$service->icon) }}" width="40">
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $service->title }}</td>
                    <td>{{ $service->position }}</td>
                    <td>
                        <a href="{{ route('admin.service.edit', $service->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.service.destroy', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
