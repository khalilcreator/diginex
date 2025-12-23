@extends('layouts.front')

@section('content')
<!-- About Hero -->
<section class="bg-primary text-white banner-web text-center">
    <div class="container py-5">
        <h1 class="display-3 fw-bold mb-3">About DiginixHub</h1>
        <p class="lead mb-4 mx-auto" style="max-width: 700px;">A digital innovation agency dedicated to transforming ideas into impactful reality.</p>
    </div>
</section>

<!-- Our Story / Mission -->
<section class="py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <img src="https://static.vecteezy.com/system/resources/previews/007/931/696/non_2x/about-us-button-about-us-text-template-for-website-about-us-icon-flat-style-vector.jpg" alt="Our Team" class="img-fluid rounded-4 shadow-lg">
            </div>
            <div class="col-md-6 ps-md-5">
                <span class="text-primary fw-bold text-uppercase ls-1">Who We Are</span>
                <h2 class="display-5 fw-bold mb-4">Driving Digital Excellence Since 2020</h2>
                <p class="lead text-muted mb-4">At DiginixHub, we believe technology should be an enabler, not a barrier. Our diverse team of experts is passionate about creating seamless digital experiences.</p>
                <p class="text-muted mb-4">From humble beginnings to a global presence, our journey has been defined by a relentless pursuit of quality and innovation. We partner with businesses of all sizes to help them navigate the digital landscape with confidence.</p>
                
                <div class="row g-4 mt-2">
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-light p-3 rounded-circle text-primary me-3">
                                <i class="fas fa-rocket fa-2x"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-0">250+</h4>
                                <span class="text-muted">Projects</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="d-flex align-items-center">
                            <div class="bg-light p-3 rounded-circle text-primary me-3">
                                <i class="fas fa-users fa-2x"></i>
                            </div>
                            <div>
                                <h4 class="fw-bold mb-0">50+</h4>
                                <span class="text-muted">Experts</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values -->
<section class="py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Core Values</h2>
            <p class="text-muted">The principles that guide every decision we make.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center hover-up">
                    <div class="card-body">
                         <div class="icon-box mb-4 text-primary">
                             <i class="fas fa-lightbulb fa-3x"></i>
                         </div>
                         <h4 class="fw-bold">Innovation</h4>
                         <p class="text-muted">We constantly challenge the status quo to find better, smarter solutions.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center hover-up">
                    <div class="card-body">
                         <div class="icon-box mb-4 text-primary">
                             <i class="fas fa-handshake fa-3x"></i>
                         </div>
                         <h4 class="fw-bold">Integrity</h4>
                         <p class="text-muted">We believe in transparent, honest, and ethical business practices.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm p-4 text-center hover-up">
                    <div class="card-body">
                         <div class="icon-box mb-4 text-primary">
                             <i class="fas fa-gem fa-3x"></i>
                         </div>
                         <h4 class="fw-bold">Quality</h4>
                         <p class="text-muted">We never settle for good enough. Excellence is our standard.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Team CTA -->
<section class="py-5 text-center">
    <div class="container py-5">
        <h2 class="fw-bold mb-3">Want to join our team?</h2>
        <p class="text-muted mb-4">We are always looking for talented individuals to join our mission.</p>
        <a href="{{ route('front_contact') }}" class="btn btn-primary rounded-pill px-5 py-3 fw-bold">Contact Us</a>
    </div>
</section>

<style>
    .hover-up { transition: transform 0.3s ease; }
    .hover-up:hover { transform: translateY(-10px); }
</style>
@endsection
