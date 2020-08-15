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
                        <h2>Visi Misi</h2>
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

    <div class="row">
      <div class="col-12">

        <center><h2 class="contact-title">Visi dan Misi Forum Komunikasi Puspa Jawa Barat</h2></center>
      </div>
      <div class="col-md-12">
        <h3>Visi</h3>
        <p>@if($visiMisi != null) {!! $visiMisi->visi !!} @endif</p>
        <br>
        <h3>Misi</h3>
        <p>@if($visiMisi != null) {!! $visiMisi->misi !!} @endif</p>

      </div>
    </div>
  </div>
</section>
@endsection