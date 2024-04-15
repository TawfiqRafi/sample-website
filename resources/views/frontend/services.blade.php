@extends('frontend.layouts.layout')

@section('main_content')

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">Services</h1>
            <a href="{{ route('home') }}" class="h5 text-white">Home</a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="#" class="h5 text-white">Services</a>
        </div>
    </div>
</div>
</div>
<!-- Navbar End -->


<!-- Full Screen Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1">
<div class="modal-dialog modal-fullscreen">
    <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
        <div class="modal-header border-0">
            <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex align-items-center justify-content-center">
            <div class="input-group" style="max-width: 600px;">
                <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Full Screen Search End -->


<!-- Service Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
<div class="container py-5">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
        <h5 class="fw-bold text-primary text-uppercase">Our Services</h5>
        <h1 class="mb-0">Custom IT Solutions for Your Successful Business</h1>
    </div>
    <div class="row g-5">
        @if ($services)
        @foreach ($services as $key=>$item)
        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
            <div class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                <div class="service-icon">
                    <i class="fa fa-shield-alt text-white"></i>
                </div>
                <h4 class="mb-3">{{ $item->title }}</h4>
                <p class="m-0">{{ $item->short_description }}</p>
                <a class="btn btn-lg btn-primary rounded" href="{{ route('service-details',$item->slug) }}">
                    <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
        @endforeach

        @endif
    </div>
</div>
</div>
<!-- Service End -->


@endsection
