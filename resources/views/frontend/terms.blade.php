@extends('frontend.layouts.layout')

@section('main_content')
    <div class="container-xxl py-5 bg-primary hero-header">
        <div class="container my-5 py-3 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="text-white animated zoomIn">Terms & Condition</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div>{!! $data?$data->content:'' !!}</div>
    </div>
@endsection
