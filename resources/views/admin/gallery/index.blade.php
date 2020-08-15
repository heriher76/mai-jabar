@extends('layouts.admin')

@section('content')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        List Gallery
                    </h1>
                </div>
                <div class="body">
                	<a href="{{ url('/admin/gallery/create?type=image') }}" class="btn btn-primary">Tambah Photo <i class="fa fa-photo"></i></a>
                	<a href="{{ url('/admin/gallery/create?type=video') }}" class="btn btn-success">Tambah Video <i class="fa fa-film"></i></a>
                    <br><br>
                	<div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Type</th>
                                    <th>Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($galleries as $gallery)
                                <tr>
                                    <td>{{ $gallery->name }}</td>
                                    <td>{{ $gallery->type }}</td>
                                    <td>{{ $gallery->created_at }}</td>
                                    <td>
                                        <form action="{{ url('admin/gallery/'.$gallery->id) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Menghapus Item Ini ?');">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- END Table -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
	$(document).ready(function() {
	    $('.dataTable').DataTable();
	});
</script>
@endsection