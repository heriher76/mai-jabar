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
                        <h2>Program Kerja</h2>
                        <p>Beranda<span>/</span>Program Kerja</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<!-- learning part start-->
<section class="learning_part" style="padding-bottom: 50px; padding-top: 50px;">
    <div class="container">
        <div class="row align-items-sm-center align-items-lg-stretch">
            <div class="col-md-7 col-lg-7">
                <div class="learning_img">
                    <img src="{{ url('front/img/learning_img.png') }}" alt="">
                </div>
            </div>
            <div class="col-md-5 col-lg-5">
                <div class="learning_member_text">
                    <h5>Program Kerja</h5>
                    <h2>Forum Komunikasi Puspa Jawa Barat</h2>
                    <ul>
                        <div class="accordion" id="accordionExample">
                            @foreach($workPrograms as $key => $workProgram)
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="{{ '#collapse'.$key }}" aria-expanded="true" aria-controls="{{ 'collapse'.$key }}">
                                <li><span class="">{{ $key+1 }}. {{ $workProgram->name }}</span></li>
                            </button>
                            <div id="{{ 'collapse'.$key }}" class="collapse @if($key == 0) show @endif" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">{!! $workProgram->description !!}</div>
                            </div>
                            <br>
                            @endforeach
                        </div>
                    </ul>
                    <!-- <a href="#" class="btn_1">Read More</a> -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--::review_part start::-->
<section class="testimonial_part">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <p></p>
                    <h2>Mitra Kerja Sama Kami</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="textimonial_iner owl-carousel">
                    @foreach($cooperations as $cooperation)
                    <div class="testimonial_slider">
                        <div class="row">
                            <div class="col-lg-6 col-xl-4 col-sm-8 align-self-center">
                                <div class="testimonial_slider_text">
                                    <h4>{{ $cooperation->name }}</h4>
                                    <h5>{{ $cooperation->date }}</h5>
                                    <p style="font-family: 'Calibri';">{!! $cooperation->description !!}</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-4 col-sm-4">
                                <div class="testimonial_slider_img">
                                    <img src="{{ url('/kerja-sama/'.$cooperation->thumbnail) }}" alt="" style="max-height: 350px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>
@endsection