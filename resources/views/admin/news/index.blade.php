@extends('layouts.admin')

@section('content')
	<div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h1>
                        Berita
                    </h1>
                    <a href="{{ url('admin/news/create') }}" class="btn btn-primary waves-effect">Tambah</a>
                </div>
                <br>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <!-- <th>Slug</th> -->
                                    <th>Publish Status</th>
                                    <th>Terakhir Update</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($news as $berita)
                                <tr>
                                    <td>{{ $berita->title }}</td>
                                    <!-- <td>{{ $berita->slug }}</td> -->
                                    <td>@php echo ($berita->publish_status == 1) ? 'Published' : 'Drafted'; @endphp</td>
                                    <td>{{ $berita->updated_at }}</td>
                                    <td>
                                        <a href="{{ url('admin/news/'.$berita->slug.'/edit') }}" class="btn btn-success btn-xs waves-effect">Edit</a>
                                        <form action="{{ url('admin/news/'.$berita->id) }}" method="POST" style="display: inline;">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button type="submit" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Anda Ingin Menghapus Berita Ini ?');">Delete</button>
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