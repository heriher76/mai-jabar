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
                        <h2>{{ $news->title }}</h2>
                        <p>Home<span>-</span>Berita</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="blog_area" style="padding-top: 50px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="single-post">
                  <div class="feature-img">
                     <center><img class="img-fluid" style="height: 350px;" src="{{ url('berita/'.$news->thumbnail) }}" alt=""></center>
                  </div>
                  <div class="blog_details">
                     <h2>{{ $news->title }}</h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li>Penulis </li>
                        <li><a href="#"><i class="far fa-user"></i> {{ $news->user->name }}</a></li>
                     </ul>
                     <p class="excert">{!! $news->description !!}</p>
                  </div>
                  <br>
                  <div id="disqus_thread"></div>
               </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                           <div class="form-group">
                              <div class="input-group mb-3">
                                 <input type="text" class="form-control" placeholder='Cari Berita'
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Cari Berita'">
                                 <div class="input-group-append">
                                    <button class="btn" type="button"><i class="ti-search"></i></button>
                                 </div>
                              </div>
                           </div>
                           <button class="button rounded-0 primary-bg text-white w-100 btn_1" type="submit">Cari</button>
                        </form>
                     </aside>
                    
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Berita Terbaru</h3>
                        @foreach($latestNews as $itemNews)
                        <div class="media post_item">
                            <img style="width: 10vw;" src="{{ url('berita/'.$itemNews->thumbnail) }}" alt="post">
                            <div class="media-body">
                                <a href="{{ url('/'.$itemNews->slug) }}">
                                    <h3>{{ $itemNews->title }}</h3>
                                </a>
                                <p>{{ $itemNews->updated_at->formatLocalized('%A %d %B %Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </aside>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection