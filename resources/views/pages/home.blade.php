@extends('layouts.app')

@section('header')
	@include('partials._header-home')
@endsection

@section('banner')
<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-xl-7">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <!-- <h5>Every child yearns to learn</h5> -->
                        <h1>Masyarakat Akuakultur Jawa Barat</h1>
                        <p>Memajukan Akuakultur Jawa Barat
                        </p>
                        <!-- <a href="#" class="btn_1">Mulai </a> -->
                        <!-- <a href="#" class="btn_2">Get Started </a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="blog_part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <!-- <p>Our Blog</p> -->
                    <h2>Berita Terkini</h2>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: -50px;">
            @foreach($newsNews as $news)
            <div class="col-sm-6 col-lg-4 col-xl-4">
                <div class="single-home-blog">
                    <div class="card">
                        <img src="{{ url('berita/'.$news->thumbnail) }}" class="card-img-top" alt="blog">
                        <div class="card-body">
                            <a href="#" class="btn_4">{{ $news->updated_at->formatLocalized('%A %d %B %Y') }}</a>
                            <a href="{{ url($news->slug) }}">
                                <h5 class="card-title">{{ $news->title }}</h5>
                            </a>
                            <p>{!! str_limit(strip_tags($news->description), $limit = 90, $end = '...') !!}</p>
                            <ul>
                                <li><i class="far fa-user"></i><a href="#" style="color: grey;"> {{ $news->user->name }}</a></li>
                                <li><i class="far fa-comments"></i><a class="disqus-comment-count" style="color: grey;" href="{{ url('/'.$news->slug) }}#disqus_thread"> Komentar</a></li> 
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <center><a href="{{ url('news') }}" class="btn_1">Lainnya</a></center>
    </div>
</section>
<br>
<section class="feature_part">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <!-- <p>tesimonials</p> -->
                    <h2>Galeri Foto Terbaru</h2>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: -50px;">
            @foreach($galleries as $gallery)
            <div class="col-sm-6 col-xl-4">
                <div class="single_feature">
                    <div class="single_feature_part">
                        <img src="{{ url('galeri/'.$gallery->name) }}" style="width: auto; min-height: 50vh;" alt="">
                        <h4>{{ $gallery->title }}</h4>
                        <p>{!! str_limit(strip_tags($gallery->desc), $limit = 90, $end = '...') !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <center><a href="{{ url('gallery-photo') }}" class="btn_1">Lainnya</a></center>
    </div>
</section>
<br><hr><br>
<section class="testimonial_part">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    <!-- <p>tesimonials</p> -->
                    <h2>Pimpinan Organisasi</h2>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: -50px;">
            <div class="col-lg-12">
                <div class="textimonial_iner owl-carousel">
                    <div class="testimonial_slider">
                        <div class="row">
                            <div class="col-lg-6 col-xl-6 col-sm-6 align-self-center">
                                <div class="testimonial_slider_text">
                                    @if($welcome != null)
                                    <p>{!! $welcome->description !!}</p>
                                    <h4>{{ $welcome->name }}</h4>
                                    <h5> {{ $welcome->title }}</h5>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-2 col-sm-6">
                                <div class="testimonial_slider_img">
                                    @if($welcome != null)
                                    <img src="{{ url('ucapan/'.$welcome->image) }}" alt="#">
                                    @endif
                                </div>
                            </div>        
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<br>
<section class="advance_feature learning_part" style="padding-top: 50px; padding-bottom: 80px;">
    <div class="container">
        <div class="row align-items-sm-center align-items-xl-stretch">
            <div class="col-md-6 col-lg-6">
                <div class="learning_member_text">
                    <h5>Tentang</h5>
                    <h2>Selayang Pandang Organisasi</h2>
                    <div class="row" style="margin-top: -80px;">
                        
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="learning_member_text_iner">
                                <br><br><br><br>
                                <!-- <span class="" style="width: 300px;">Learn Anywhere</span> -->
                                @if($overview != null)
                                <h4>{{ $overview->title }}</h4>
                                <p>{!! $overview->description !!}</p>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="learning_img">
                    <img src="{{ url('front/img/advance_feature_img.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- learning part end-->
@endsection

@section('script')
<script id="dsq-count-scr" src="//forkom-puspajabar.disqus.com/count.js" async></script>
@endsection