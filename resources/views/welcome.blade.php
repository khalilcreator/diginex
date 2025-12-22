@extends('layouts.front')

@section('content')
<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <span class="hero-tag">Blog</span>
        <h1 class="hero-title">Discover our latest news</h1>
        <p class="hero-subtitle">Discover the achievements that set us apart. From groundbreaking projects to industry accolades, we take pride in our accomplishments.</p>
        
        <div class="search-wrapper">
             <form action="{{ route('front_blog') }}" method="GET" class="w-100 d-flex gap-2">
                 <input type="text" name="search" class="search-input" placeholder="Search for news...">
                 <button class="btn-search">Find Now</button>
             </form>
        </div>
    </div>
</section>

<!-- Services Section (Dynamic) -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title">Our Services</h2>
        <div class="row g-4">
             @foreach($services as $service)
             <div class="col-md-4">
                 <div class="custom-card card h-100">
                     <div class="card-body text-center">
                         @if($service->icon)
                             <img src="{{ asset('storage/'.$service->icon) }}" alt="{{ $service->title }}" style="height: 60px; margin-bottom: 20px;">
                         @else
                            <div style="font-size: 3rem; color: rgb(25 79 160); margin-bottom: 20px;">
                                <i class="fas fa-layer-group"></i>
                            </div>
                         @endif
                         <h5 class="card-title">{{ $service->title }}</h5>
                         <p class="card-text">{{ Str::limit($service->description, 100) }}</p>
                         <a href="tel:{{ \App\Models\Setting::getValue('phone') ?? '+1234567890' }}" class="btn btn-outline-primary rounded-pill btn-sm">Consult Now</a>
                     </div>
                 </div>
             </div>
             @endforeach
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('front_services') }}" class="btn btn-outline-primary rounded-pill px-4">View All Services</a>
        </div>
    </div>
</section>

<!-- Latest Blogs Section -->
<section class="py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
             <h2 class="section-title mb-0">Whiteboards are remarkable.</h2>
             <a href="{{ route('front_blog') }}" class="btn-auth-outline">View All</a>
        </div>
       
        <div class="row g-4">
            <!-- Featured / Latest Items -->
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
                        <span class="card-meta">
                            {{ $blog->created_at->format('F d, Y') }} &bull; 
                            <a href="{{ route('front_blog', ['category' => $blog->category->name]) }}" class="text-decoration-none text-muted">{{ $blog->category->name ?? 'Uncategorized' }}</a>
                        </span>
                        <h5 class="card-title">
                            <a href="{{ route('front_blog.show', $blog->slug) }}" class="text-decoration-none text-dark">{{ $blog->title }}</a>
                        </h5>
                        <div class="card-text">{!! Str::limit(strip_tags($blog->content), 80) !!}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonial Section -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="section-title text-center mb-5">What our Clients Say</h2>
        <div class="row justify-content-center">
            <div class="col-md-8">
                 <div class="card border-0 shadow-sm p-4 text-center">
                     <div class="mb-3 text-warning">
                         <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                     </div>
                     <p class="lead mb-4">"Enjooy completely transformed our digital presence. Their team is professional, creative, and results-driven. Highly recommended!"</p>
                     <h6 class="fw-bold">Sarah James</h6>
                     <span class="text-muted text-small">CEO, TechStart</span>
                 </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-primary text-white text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Ready to start your project?</h2>
        <p class="lead mb-4">Let's build something amazing together.</p>
        <a href="{{ route('front_contact') }}" class="btn btn-light btn-lg rounded-pill px-5 fw-bold text-primary">Contact Us Details</a>
    </div>
</section>
@endsection
