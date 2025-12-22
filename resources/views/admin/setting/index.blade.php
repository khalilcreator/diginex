@extends('layouts.admin')

@section('page_title', 'General Settings')

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">General Information</div>
            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                
                <form action="{{ route('admin.setting.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" value="{{ \App\Models\Setting::getValue('phone') }}">
                    </div>

                    <button class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
