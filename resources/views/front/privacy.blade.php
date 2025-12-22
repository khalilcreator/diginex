@extends('layouts.front')

@section('content')
<section class="bg-primary text-white banner-web text-center">
    <div class="container py-5">
        <h1 class="display-3 fw-bold">Privacy Policy</h1>
        <p class="lead">Our Terms of Use govern Your use of our Service. </p>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 text-muted">
                <p>Last updated: {{ date('F d, Y') }}</p>
                <p>This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.</p>
                <h3>Collecting and Using Your Personal Data</h3>
                <p>We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy.</p>
            </div>
        </div>
    </div>
</section>
@endsection
