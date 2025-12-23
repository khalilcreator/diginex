@extends('layouts.front')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-3">
                        <i class="fas fa-user-circle fa-5x text-primary"></i>
                    </div>
                    <h5>{{ $user->name }}</h5>
                    <p class="text-muted small">{{ $user->email }}</p>
                    <hr>
                    <div class="d-grid gap-2">
                        <a href="#editProfile" data-bs-toggle="collapse" class="btn btn-outline-primary btn-sm">Edit Profile</a>
                        <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="collapse mb-4" id="editProfile">
                <div class="card">
                    <div class="card-header">Edit Profile</div>
                    <div class="card-body">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                            </div>
                            <button class="btn btn-primary">Update Profile</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <i class="fas fa-heart text-danger"></i> My Favorites ({{ $favorites->count() }})
                </div>
                <div class="card-body">
                    @if($favorites->count() > 0)
                        <div class="row g-4">
                            @foreach($favorites as $favorite)
                            <div class="col-md-6">
                                <div class="card h-100">
                                    @if($favorite->blog->image)
                                        <img src="{{ asset($favorite->blog->image) }}" class="card-img-top" alt="{{ $favorite->blog->title }}" style="height: 200px; object-fit: cover;">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <a href="{{ route('front_blog.show', $favorite->blog->slug) }}" class="text-decoration-none text-dark">
                                                {{ $favorite->blog->title }}
                                            </a>
                                        </h5>
                                        <p class="card-text text-muted small">
                                            <i class="fas fa-eye"></i> {{ $favorite->blog->views }} views
                                        </p>
                                        <button class="btn btn-sm btn-outline-danger favorite-btn" data-blog-id="{{ $favorite->blog->id }}">
                                            <i class="fas fa-heart"></i> Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted text-center py-5">No favorites yet. Start adding blogs to your favorites!</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.favorite-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const blogId = this.dataset.blogId;
        fetch('{{ route("favorite.toggle") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ blog_id: blogId })
        })
        .then(res => res.json())
        .then(data => {
            location.reload();
        });
    });
});
</script>
@endsection
