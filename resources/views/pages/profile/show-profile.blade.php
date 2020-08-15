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
                        <h2>Profil Anggota</h2>
                        <p>Beranda<span>/<span>Profil</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="contact-section" style="padding-top: 50px;">
  <div class="container">
    <center>
    	<img class="img-responsive" style="max-width: 250px;" src="{{ url('structureorganization/'.$profile->image) }}" alt="">
    	<br><br>
    	<b><h2>{{ $profile->name }}</h2></b>
    	<h3>{{ $profile->title }}</h3>
    	<h4 style="color: grey">{{ $profile->email }}</h4>
    </center>
	<br>
	<h5>Tempat / Tanggal Lahir : {{ $profile->ttl }}</h5>
	<h5>Agama : {{ $profile->religion }}</h5>
  	<hr>
  	<h5>Riwayat Pendidikan</h5>
  	{!! $profile->schools !!}
  	<hr>
  	<h5>Riwayat Pekerjaan</h5>
  	{!! $profile->jobs !!}
  	<hr>
  	<h5>Riwayat Organisasi</h5>
  	{!! $profile->organizations !!}
  	<hr>
  	<h5>Prestasi / Penghargaan</h5>
  	{!! $profile->achievements !!}
  	<hr>
  	<h5>Tentang</h5>
  	{!! $profile->description !!}
  	<hr>
  </div>
</section>
@endsection
