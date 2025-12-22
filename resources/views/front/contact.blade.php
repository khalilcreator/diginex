@extends('layouts.front')

@section('content')
<!-- Contact Hero -->
<section class="bg-primary text-white banner-web text-center">
    <div class="container py-5">
        <h1 class="display-3 fw-bold">Get In Touch</h1>
        <p class="lead">We'd love to hear from you. Let's start a conversation.</p>
    </div>
</section>

<section class="py-5">
    <div class="container py-5">
        <div class="row g-5">
            <!-- Contact Info -->
             <div class="col-md-5">
                 <h2 class="fw-bold mb-4">Contact Information</h2>
                 <p class="text-muted mb-5">Have a project in mind or just want to say hi? Feel free to reach out to us using the details below.</p>
                 
                 <div class="d-flex mb-4">
                     <div class="flex-shrink-0 btn-lg-square bg-light text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                         <i class="fas fa-map-marker-alt fa-lg"></i>
                     </div>
                     <div class="ms-4">
                         <h5 class="fw-bold mb-1">Our Location</h5>
                         <p class="text-muted mb-0">123 Innovation Drive, Tech Valley, CA 94043</p>
                     </div>
                 </div>

                 <div class="d-flex mb-4">
                     <div class="flex-shrink-0 btn-lg-square bg-light text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                         <i class="fas fa-envelope fa-lg"></i>
                     </div>
                     <div class="ms-4">
                         <h5 class="fw-bold mb-1">Email Us</h5>
                         <p class="text-muted mb-0">hello@diginixhub.com</p>
                     </div>
                 </div>

                 <div class="d-flex mb-4">
                     <div class="flex-shrink-0 btn-lg-square bg-light text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                         <i class="fas fa-phone-alt fa-lg"></i>
                     </div>
                     <div class="ms-4">
                         <h5 class="fw-bold mb-1">Call Us</h5>
                         <p class="text-muted mb-0">+1 (555) 123-4567</p>
                     </div>
                 </div>
                 
                 <div class="mt-5">
                     <h5 class="fw-bold mb-3">Follow Us</h5>
                     <div class="d-flex gap-3">
                         <a href="#" class="btn btn-outline-secondary rounded-circle"><i class="fab fa-facebook-f"></i></a>
                         <a href="#" class="btn btn-outline-secondary rounded-circle"><i class="fab fa-twitter"></i></a>
                         <a href="#" class="btn btn-outline-secondary rounded-circle"><i class="fab fa-instagram"></i></a>
                         <a href="#" class="btn btn-outline-secondary rounded-circle"><i class="fab fa-linkedin-in"></i></a>
                     </div>
                 </div>
             </div>

             <!-- Contact Form -->
             <div class="col-md-7">
                 <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5">
                     <h3 class="fw-bold mb-4">Send us a Message</h3>
                     
                     @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                     @endif

                     <form action="{{ route('front_contact.store') }}" method="POST">
                         @csrf
                         <div class="row g-3">
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="text" class="form-control bg-light border-0" id="name" name="name" placeholder="Your Name" required>
                                     <label for="name">Your Name</label>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-floating">
                                     <input type="email" class="form-control bg-light border-0" id="email" name="email" placeholder="Your Email" required>
                                     <label for="email">Your Email</label>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="form-floating">
                                     <input type="text" class="form-control bg-light border-0" id="subject" name="subject" placeholder="Subject" required>
                                     <label for="subject">Subject</label>
                                 </div>
                             </div>
                             <div class="col-12">
                                 <div class="form-floating">
                                     <textarea class="form-control bg-light border-0" placeholder="Message" id="message" name="message" style="height: 150px" required></textarea>
                                     <label for="message">Message</label>
                                 </div>
                             </div>
                             
                             <!-- Simple Math Captcha -->
                             <div class="col-12">
                                 <label class="form-label fw-bold">Anti-Bot Validation</label>
                                 <div class="d-flex align-items-center gap-3">
                                     <span class="bg-light p-2 rounded fw-bold border">3 + 5 = ?</span>
                                     <input type="number" name="captcha" class="form-control w-25" required placeholder="Answer">
                                 </div>
                             </div>

                             <div class="col-12 mt-4">
                                 <button type="submit" class="btn btn-primary w-100 py-3 fw-bold rounded-pill">Send Message</button>
                             </div>
                         </div>
                     </form>
                 </div>
             </div>
        </div>
    </div>
</section>

@endsection
