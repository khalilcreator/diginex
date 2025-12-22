@extends('layouts.front')

@section('content')
<section class="py-5">
    <section class="bg-primary text-white banner-web text-center">
        <div class="container py-5">
            <h1 class="display-3 fw-bold">Our Blog</h1>
            <p class="lead">Providing top-notch digital solutions for your business.</p>
        </div>
    </section>
    <div class="container mt-5">
        
        
        <div class="row mb-5">
            <div class="col-md-8 mx-auto">
                 <form action="{{ route('front_blog') }}" method="GET" class="d-flex gap-2 mb-3">
                     <input type="text" name="search" class="form-control" placeholder="Search blogs..." value="{{ request('search') }}">
                     <button class="btn btn-primary">Search</button>
                 </form>
                 <div class="text-center">
                     <a href="{{ route('front_blog') }}" class="btn btn-sm btn-outline-secondary m-1 {{ !request('category') ? 'active' : '' }}">All</a>
                     @foreach($categories as $category)
                        <a href="{{ route('front_blog', ['category' => $category->name]) }}" class="btn btn-sm btn-outline-secondary m-1 {{ request('category') == $category->name ? 'active' : '' }}">{{ $category->name }}</a>
                     @endforeach
                 </div>
            </div>
        </div>

        <div class="row g-4">
            @foreach($blogs as $blog)
            <div class="col-md-4">
                <div class="custom-card card h-100">
                    @if($blog->image)
                        <img src="{{ asset('storage/'.$blog->image) }}" class="card-img-top" alt="{{ $blog->title }}">
                    @else
                         <div class="bg-primary text-white d-flex align-items-center justify-content-center card-img-top">
                             No Image
                         </div>
                    @endif
                    <div class="card-body">
                        <span class="card-meta">{{ $blog->created_at->format('F d, Y') }} &bull; {{ $blog->category->name ?? 'Uncategorized' }}</span>
                        <h5 class="card-title">
                            <a href="{{ route('front_blog.show', $blog->slug) }}" class="text-decoration-none text-dark">{{ $blog->title }}</a>
                        </h5>
                        <div class="card-text">{!! Str::limit(strip_tags($blog->content), 80) !!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $blogs->links() }}
        </div>
    </div>
</section>
@endsection
