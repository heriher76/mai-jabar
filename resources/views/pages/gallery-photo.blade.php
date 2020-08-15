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
                        <h2>Galeri Foto</h2>
                        <p>Beranda<span>/</span>Galeri Foto</p>
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
                    <h2>Foto Dokumentasi</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($galleries as $gallery)
                <div class="col-sm-6 col-lg-4">
                    <div class="single_special_cource">
                        <center><img src="{{ url('galeri/'.$gallery->name) }}" class="special_img" style="width: auto; min-height: 60vh;" alt=""></center>
                        <div class="special_cource_text" style="padding-top: 0px;">
                            <a>
                                <h3>{{ $gallery->title }}</h3>
                            </a>
                            <p>{{ $gallery->desc }}</p>
                            
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection