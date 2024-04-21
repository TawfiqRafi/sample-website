@extends('frontend.layouts.layout')

@section('main_content')

<div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
    <div class="row py-5">
        <div class="col-12 pt-lg-5 mt-lg-5 text-center">
            <h1 class="display-4 text-white animated zoomIn">Products</h1>
            <a href="{{ route('home') }}" class="h5 text-white">Home</a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="#" class="h5 text-white active-primary">Products</a>
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


        <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                    <h5 class="fw-bold text-primary text-uppercase">Our products</h5>
                    <h1 class="mb-0">Recently Launched products</h1>
                </div>
                <div class="row g-5">
                    @if ($products)
                    @foreach ($products as  $key => $item)
                    <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                        <a class="team-item bg-light rounded overflow-hidden" href="{{ route('product-details',$item->slug) }}">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid w-100" src="{{ asset($item->image)}}" alt="">
                            </div>
                            <div class="text-center py-4">
                                <h5 class="text-primary">{{ $item->title }}</h5>
                                <p class="text-uppercase m-0">{{ $item->short_description }}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
        
                    @endif
                </div>
            </div>
        </div> 


@endsection
