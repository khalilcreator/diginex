@extends('layouts.front')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="mb-3 font-weight-bold">{{ $blog->title }}</h1>
                <p class="text-muted mb-4">
                    <i class="fas fa-calendar"></i> {{ $blog->created_at->format('F d, Y') }} &bull;
                    <i class="fas fa-user"></i> {{ $blog->user->name }} &bull;
                    @if($blog->category) <i class="fas fa-folder"></i> {{ $blog->category->name }} &bull; @endif
                    <i class="fas fa-eye"></i> {{ $blog->views }} views
                </p>

                @auth
                <button class="btn btn-sm {{ $blog->isFavoritedBy(auth()->user()) ? 'btn-danger' : 'btn-outline-danger' }} mb-3 favorite-btn" data-blog-id="{{ $blog->id }}">
                    <i class="fas fa-heart"></i> {{ $blog->isFavoritedBy(auth()->user()) ? 'Remove from Favorites' : 'Add to Favorites' }}
                </button>
                @endauth

                @if($blog->image)
                    <img src="{{ asset($blog->image) }}" class="img-fluid rounded mb-4 w-100" alt="{{ $blog->title }}">
                @endif

                <div class="blog-content">
                    {!! $blog->content !!}
                </div>
                
                 <hr class="my-5">
                 
                 <a href="{{ route('front_blog') }}" class="btn btn-outline-secondary">&larr; Back to Blogs</a>
            </div>
        </div>

        @if($relatedBlogs->count() > 0)
        <div class="row mt-5">
            <div class="col-12">
                <h3 class="mb-4">Related Posts</h3>
            </div>
             @foreach($relatedBlogs as $rBlog)
            <div class="col-md-4">
                <div class="custom-card card h-100">
                    @if($rBlog->image)
                        <img src="{{ asset($rBlog->image) }}" class="card-img-top" alt="{{ $rBlog->title }}" style="height: 200px; object-fit: cover;">
                    @else
                         <div class="bg-primary text-white d-flex align-items-center justify-content-center card-img-top" style="height: 200px;">
                             No Image
                         </div>
                    @endif
                    <div class="card-body">
                        <span class="card-meta">
                             {{ $rBlog->created_at->format('M d') }} &bull; {{ $rBlog->category->name }}
                        </span>
                        <h5 class="card-title h6">
                            <a href="{{ route('front_blog.show', $rBlog->slug) }}" class="text-decoration-none text-dark">{{ $rBlog->title }}</a>
                        </h5>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
    </div>
</section>

<script>
document.querySelector('.favorite-btn')?.addEventListener('click', function() {
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
</script>
@endsection
