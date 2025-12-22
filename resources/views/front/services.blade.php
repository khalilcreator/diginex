@extends('layouts.front')

@section('content')
<!-- Hero Section --> 
<section class="bg-primary text-white banner-web text-center">
    <div class="container py-5">
        <h1 class="display-3 fw-bold">Our Services</h1>
        <p class="lead">Providing top-notch digital solutions for your business.</p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-5">
    <div class="container">
        <!-- Consult Now Button -->
        <div class="text-center mb-5">
            <a href="tel:{{ \App\Models\Setting::getValue('phone') ?? '+1234567890' }}" class="btn btn-primary rounded-pill px-4 py-2 fw-bold shadow">
                <i class="fas fa-phone-alt me-2"></i> Consult Now
            </a>
        </div>
        <div class="row g-4">
             @foreach($services as $service)
             <div class="col-md-4">
                 <div class="custom-card card h-100 shadow-sm">
                     <div class="card-body text-center p-4">
                         @if($service->icon)
                             <img src="{{ asset('storage/'.$service->icon) }}" alt="{{ $service->title }}" style="height: 70px; margin-bottom: 20px;">
                         @else
                            <div style="font-size: 3.5rem; color: rgb(25 79 160); margin-bottom: 20px;">
                                <i class="fas fa-layer-group"></i>
                            </div>
                         @endif
                         <h3 class="h4 mb-3">{{ $service->title }}</h3>
                         <p class="text-muted mb-4">{{ $service->description }}</p>
                         
                         <a href="tel:{{ \App\Models\Setting::getValue('phone') ?? '+1234567890' }}" class="btn btn-outline-primary rounded-pill btn-sm">Consult Now</a>
                     </div>
                 </div>
             </div>
             @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-light text-center">
    <div class="container">
        <h2 class="fw-bold mb-3">Reach Out to Us</h2>
        <p class="lead mb-4">See how we've helped other businesses succeed.</p>
        <a href="tel:{{ \App\Models\Setting::getValue('phone') ?? '+1234567890' }}" class="btn btn-primary rounded-pill px-5">Cal To Us</a>
    </div>
</section>
@endsection
