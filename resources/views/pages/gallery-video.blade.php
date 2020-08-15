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
                        <h2>Galeri Video</h2>
                        <p>Beranda<span>/</span>Galeri Video</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="special_cource" style="padding-top: 50px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <!-- <p>popular courses</p> -->
                    <h2>Video Dokumentasi</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($galleries as $gallery)
                <div class="col-sm-6 col-lg-4">
                	<iframe width="100%" height="100%" style="min-height: 60vh;" src="{{ url('https://www.youtube.com/embed/'.$gallery->name) }}" frameborder="0" allowfullscreen></iframe>
            	</div>
            @endforeach
        </div>
    </div>
</section>
@endsection