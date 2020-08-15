@extends('layouts.admin')

@section('content')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Tambah Photo
                    </h1>
                </div>
                <div class="body">
                    <form action="{{ url('admin/gallery?type=image') }}" id="myForm" class="willSubmit" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group form-float">
                            <div class="form-line">
                                <p>Pilih File</p>
                                <input type="file" class="form-control" name="name" required="">
                                <br>
                                <input type="text" class="form-control" name="title" placeholder="Judul Foto" required="">
                                <br>
                                <p>Deskripsi *optional</p>
                                <textarea name="desc" class="form-control"></textarea>
                            </div>
                        </div>
						<button type="submit" class="btn btn-primary m-t-15 waves-effect">Upload</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection