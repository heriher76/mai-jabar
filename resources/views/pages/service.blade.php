@extends('layouts.app')

@section('header')
	@include('partials._header')
@endsection

@section('banner')
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Layanan</h2>
                        <p>Beranda<span>/</span>Layanan</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="feature_part" style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            @foreach($services as $service)
            <div class="col-sm-6 col-xl-3">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <span class="single_feature_icon" style="width: 100px; height: 100px;"><img style="height: 100px; width: 100px;" src="{{ url('/icon/'.$service->icon) }}" alt=""></span>
                        <br>
                        <h4>{{ $service->title }}</h4>
                        <p>{!! $service->description !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- upcoming_event part start-->
@endsection