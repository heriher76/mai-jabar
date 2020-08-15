@extends('layouts.admin')

@section('content')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Layanan
                    </h1>
                    <a href="{{ url('admin/services/create') }}" class="btn btn-primary waves-effect">Tambah</a>
                </div>
                <br>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Deskripsi</th>
                                    <th>Icon</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                <tr>
                                    <td>{{ $service->title }}</td>
                                    <td>{{ str_limit(strip_tags($service->description), $limit = 90, $end = '...') }}</td>
                                    <td>{{ $service->icon }}</td>
                                    <td>
                                        <a href="{{ url('admin/services/'.$service->id.'/edit') }}" class="btn btn-success btn-xs waves-effect">Edit</a>
                                        <form action="{{ url('admin/services/'.$service->id) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Menghapus Layanan Ini ?');">Delete</button>
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