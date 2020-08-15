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
                        <h2>Berita</h2>
                        <p>Home<span>/</span>Berita</p>
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
                <div class="blog_left_sidebar">

                    @foreach($news as $berita)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <center><img class="card-img rounded-0" src="{{ url('berita/'.$berita->thumbnail) }}" style="height: 350px; width: auto;" alt=""></center>
                            <a href="#" class="blog_item_date">
                                <!-- <h3>15</h3> -->
                                <p>{{ $berita->updated_at->formatLocalized('%A %d %B %Y') }}</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="{{ url('/'.$berita->slug) }}">
                                <h2>{{ $berita->title }}</h2>
                            </a>
                            <p>{!! str_limit(strip_tags($berita->description), $limit = 90, $end = '...') !!}</p>
                            <ul class="blog-info-link">
                                <li><i class="far fa-user"></i><a href="#">{{ $berita->user->name }}</a></li>
                                <li><i class="far fa-comments"></i><a class="disqus-comment-count"  href="{{ url('/'.$berita->slug) }}#disqus_thread"> Komentar</a></li>    
                            </ul>
                        </div>
                    </article>
                    @endforeach

                    {{ $news->links() }}
                    
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="{{ url('/news') }}" method="GET">
                           <div class="form-group">
                              <div class="input-group mb-3">
                                 <input type="text" name="search" class="form-control" placeholder='Cari Berita'
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
                        <h3 class="widget_title">Berita Lainnya</h3>
                        @foreach($oldNews as $itemNews)
                        <div class="media post_item">
                            <img style="width: 10vw;" src="{{ url('berita/'.$itemNews->thumbnail) }}" alt="">
                            <div class="media-body">
                                <a href="{{ url($itemNews->slug) }}">
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

@section('script')
<script id="dsq-count-scr" src="//forkom-puspajabar.disqus.com/count.js" async></script>
@endsection